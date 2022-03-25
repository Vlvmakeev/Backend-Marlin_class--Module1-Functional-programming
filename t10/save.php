<?php
    session_start();


    $text = $_POST['user_text'];    
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=task10', 'root', '');
    $sql = 'SELECT * FROM texts WHERE user_text=:user_text';
    $statement = $pdo->prepare($sql);
    $statement->execute(['user_text' => $text]);
    $task = $statement->fetch(PDO::FETCH_ASSOC);
    
    if ( !empty($task)  ){
        header('Location: /index.php');
        $message = 'Введенная запись уже существует в таблице';
        $_SESSION['danger'] = $message;
        exit;
    }

    $sql = 'INSERT INTO texts (user_text) VALUES (:user_text)';
    $statement = $pdo->prepare($sql);
    $statement->execute($_POST);
    $message = 'Введенная запись уже существует в таблице';
    $_SESSION['success'] = $message;

    header('Location: /index.php');

?>