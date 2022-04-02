<?php
    session_start();    
    
    $user_login = $_POST['emailverify'];
    $user_password = password_hash($_POST['userpassword'], PASSWORD_DEFAULT);

    

    if( !empty(get_user_by_email($user_login)) ){
        set_flash_message('danger', '<strong>Уведомление!</strong> Этот эл. адрес уже занят другим пользователем.');
        redirect_to('page_register.php');
    } else{
        add_user($user_login, $user_password);
        set_flash_message('success', 'Регистрация успешна');
        redirect_to('page_login.php');
    }
    

    function get_user_by_email($email){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');    
        $sql = 'SELECT * FROM users WHERE email=:email';
        $statement = $pdo->prepare($sql);
        $statement->execute(['email' => $email]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $user;
        
    }

    function add_user($email, $password) {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $sql = "SELECT * FROM users WHERE email='$email'";
        $statement = $pdo->query($sql);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $id = $user['id'];

        return $id;
    }

    function set_flash_message($name, $message){
        $_SESSION[$name] = $message;
    }

    function redirect_to($path){
        header("Location: $path");
    }

?>