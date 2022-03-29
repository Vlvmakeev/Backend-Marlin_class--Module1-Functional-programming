<?php 

    

    $upload = $_FILES['image']['tmp_name'];

    $path = 'user_img/' . uniqid() . '.jpg';
    move_uploaded_file($upload, $path);
    

    $pdo = new PDO('mysql:host=localhost;dbname=task15', 'root', '');

    $sql = "INSERT INTO images (image) VALUES (:image)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['image' => $path]);

    header('Location: /task_15.php');

    

?>