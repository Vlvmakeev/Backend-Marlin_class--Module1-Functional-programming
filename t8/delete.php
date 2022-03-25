<?php

    $pdo = new PDO('mysql:host=localhost;dbname=task8', 'root', '');
    $sql = 'DELETE FROM users WHERE id =:id';
    $statement = $pdo->prepare($sql);
    $statement->execute($_GET);

    header('Location: /task_8.php')

?>