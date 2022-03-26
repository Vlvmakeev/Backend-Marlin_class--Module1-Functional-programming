<?php 
    session_start();
    
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $pdo = new PDO('mysql:host=localhost; dbname=task11', 'root', '');
    $sql = 'SELECT * FROM users WHERE email=:email';
    $statement = $pdo->prepare($sql);
    $statement->execute(['email' => $email]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if ($user == true) {
        $_SESSION['user_exist'] = true;
        header('Location: /task_11.php');
        exit;
    } else {
        $sql = "INSERT INTO users SET email='$email', password='$password'";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $_SESSION['user_exist'] = false;
        header('Location: /task_11.php');
        exit;
    }
    
    
?>