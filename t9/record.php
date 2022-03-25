<?php

    $pdo = new PDO('mysql:host=127.0.0.1; dbname=task9', 'root', '');
    $sql = 'INSERT INTO texts (id, user_text) VALUES (NULL, :user_text)';
    $statement = $pdo->prepare($sql);
    $statement->execute($_POST);

    header('Location: /index.php');

?>