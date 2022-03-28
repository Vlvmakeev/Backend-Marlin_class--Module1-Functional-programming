<?php
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    $pdo = new PDO('mysql:host=localhost;dbname=task11', 'root', '');
    $sql = 'SELECT * FROM users WHERE email=:email';
    $statement = $pdo->prepare($sql);
    $statement->execute(['email' => $email ]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if( $user == true )
    {
        if( password_verify($password, $user['password']) )
        {
            $_SESSION['result'] = $email;
            unset($_SESSION['failed']);
            header('Location: /task_14.php');
            exit;
        } else 
        {
            $_SESSION['failed'] = $email;
            unset($_SESSION['result']);
            header('Location: /task_14.php');
            exit;
        }
    } 
    else 
    {
        $_SESSION['failed'] = $email;
        unset($_SESSION['result']);
        header('Location: /task_14.php');
        exit;
    }

    
?>