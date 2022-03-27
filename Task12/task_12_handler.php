<?php
    session_start();
    
    $text = $_POST['user_text'];
    
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=task12', 'root', '');
    $sql = 'INSERT INTO texts (user_text) VALUE (:user_text)';
    $statement = $pdo->prepare($sql);
    $statement->execute($_POST);

    $sql = "SELECT * FROM texts WHERE user_text='$text'";
    $statement = $pdo->prepare($sql);
    $statement->execute($_POST);
    $_SESSION['message'] = $statement->fetch(PDO::FETCH_ASSOC);


    header('Location: /task_12.php');

?>