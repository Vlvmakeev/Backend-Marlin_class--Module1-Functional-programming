<?php
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    $pdo = new PDO('mysql:host=127.0.0.1;dbname=task11', 'root', '');
    $sql = 'SELECT * FROM users WHERE email=:email';
    $statement = $pdo->prepare($sql);
    $statement->execute(['email' => $email]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if( $user['email'] == $email )
    {
        if( password_verify($password, $user['password']) )
        {
            $_SESSION['result'] = $email;
            header('Location: /task_14_1.php');
            exit;
        }
        else{
            $_SESSION['failed'] = 'Неуспешно';
            header('Location: /task_14.php');
            exit;
        }
    } else
    {
        $_SESSION['failed'] = 'Неуспешно';
        header('Location: /task_14.php');
        exit;
    }

?>