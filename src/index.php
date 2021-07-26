<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Hello, human</title>
    <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>
</head>

<body>
    <img src="https://media.giphy.com/media/WpIPS0DWNpMm4kfMVr/giphy.gif" alt="Hello there" class="center">
    <?php
    $connection = new PDO('mysql:host=mysql;dbname=webdev;charset=utf8', 'root', 'root');
    $query      = $connection->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'webdev'");
    $tables     = $query->fetchAll(PDO::FETCH_COLUMN);

    if (empty($tables)) {
        echo '<p class="center">There are no tables in database <code>webdev</code>.</p>';
    } else {
        echo '<p class="center">Database <code>webdev</code> contains the following tables:</p>';
        echo '<ul class="center">';
        foreach ($tables as $table) {
            echo "<li>{$table}</li>";
        }
        echo '</ul>';
    }
    ?>
</body>

</html>