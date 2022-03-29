<?php
    session_start();
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=task151', 'root', '');
    $sql = 'DELETE FROM images WHERE id=:id';
    $statement = $pdo->prepare($sql);
    $statement->execute($_GET);

    header('Location: /task_15_1.php');
?>