<?php
    
    session_start();

    $upload = $_FILES['image']['tmp_name'];
    $rename = 'user_img/' . uniqid() . '.jpg';
    move_uploaded_file($upload, $rename);

    $pdo = new PDO('mysql:host=127.0.0.1;dbname=task151', 'root', '');
    $sql = "INSERT INTO images (image) VALUES (:image)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['image' => $rename]);

    header('Location: /task_15_1.php');

?>