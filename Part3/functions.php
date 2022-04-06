<?php
    function get_user_by_email($email){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "SELECT * FROM users WHERE email='$email'";
        $statement = $pdo->query($sql);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        return $user;}

    function add_user($email, $password){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "INSERT INTO users (email, password, role) VALUES ('$email', '$password', 'user')";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $sql = "SELECT * FROM users WHERE email='$email'";
        $statement = $pdo->query($sql);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        return $user['id'];}

    function set_flash_message($name, $message){
        $_SESSION[$name] = $message;}

    function display_flash_message($name){
        if(isset($_SESSION[$name])){
            echo "<div class=\"alert alert-{$name} text-dark\" role=\"alert\">{$_SESSION[$name]}</div>";
            unset($_SESSION[$name]);}}

    function redirect_to($path){
        header("Location: $path");}

    function verify($login, $password){
        $user = get_user_by_email($login);
        if( !empty($user) ){
            if( password_verify($password, $user['password'])  ){
                authorization($user);
                redirect_to('users.php');
                exit;
            } else{
                set_flash_message('danger', 'Неверный логин или пароль');
                redirect_to('page_login.php');
                exit;
            }
        } else{
            set_flash_message('danger', 'Неверный логин или пароль');
            redirect_to('page_login.php');
            exit;
        }}
    
    function authorization($user){
        $_SESSION['user'] = $user;}
    function is_admin($user){
        if( $user['role'] == 'admin' ){
            $_SESSION['admin'] = $user;
            return true;
            exit;
            }else{
                return false;
                exit;
            }    
        }

    function is_not_logged($user){
        if( empty($user) ){
            redirect_to('page_login.php');
            set_flash_message('danger', 'Неверный логин или пароль');
            return 0;
            exit;
        }else{
            if( $user['role'] == 'admin' ){
                is_admin($user);
                return 1;
                exit;
            }else{
                get_user_by_email($user);
                return 2;
            }
        }}
?>