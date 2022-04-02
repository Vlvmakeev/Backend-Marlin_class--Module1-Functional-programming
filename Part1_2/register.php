<?php
    session_start();
    display_flash_message($_POST);

    function get_user_by_email($email){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "SELECT * FROM users WHERE email='$email'";
        $statement = $pdo->query($sql);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        return $user['email'];
    }

    function add_user($email, $password){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $sql = "SELECT * FROM users WHERE email='$email'";
        $statement = $pdo->query($sql);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        return $user['id'];
    }

    function set_flash_message($name, $message){
        $_SESSION[$name] = $message;
    }

    function display_flash_message($name){
        if( !empty(get_user_by_email($name['emailverify'])) ){
            set_flash_message('danger', '<strong>Уведомление!</strong> Этот эл. адрес уже занят другим пользователем.');
            redirect_to('page_register.php');
        } else{
            add_user($name['emailverify'], password_hash($name['userpassword'], PASSWORD_DEFAULT));
            set_flash_message('success', 'Регистрация успешна');
            redirect_to('page_login.php');
        }
    }

    function redirect_to($path){
        header("Location: $path");
    }
?>