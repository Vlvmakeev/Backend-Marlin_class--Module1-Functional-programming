<?php

    $pdo = new PDO('mysql:host=localhost;dbname=task8', 'root', '');
    $sql = 'UPDATE users SET FirstName=:FirstName, LastName=:LastName, Username=:Username WHERE id=:id';
    $statement = $pdo->prepare($sql);
    $statement->execute($_POST);

    header('Location: /task_8.php');

?>