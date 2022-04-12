<?php
    function get_all_users(){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = 'SELECT * FROM users';
        $statement = $pdo->query($sql);
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $users;}
    
    function get_user_by_id($id){
        $pdo = new PDO('mysql:host=localhost;dbname=part1', 'root', '');
        $sql = "SELECT * FROM users WHERE id='$id'";
        $statement = $pdo->query($sql);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $user;}

    function get_user_by_email($email){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "SELECT * FROM users WHERE email='$email'";
        $statement = $pdo->query($sql);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        return $user;}
        
    function get_user_info($user_id){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "SELECT * FROM user_info_lists WHERE user_id='$user_id'";
        $statement = $pdo->query($sql);
        $user_info = $statement->fetch(PDO::FETCH_ASSOC);
    
        return $user_info;}

    function get_user_image($user_id){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "SELECT * FROM user_image_list WHERE user_id='$user_id'";
        $statement = $pdo->query($sql);
        $user_image = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $user_image;
    }

    function has_image($get_user_image){
        if( $get_user_image == false ){
            $user_image = 'img/demo/avatars/avatar-f.png';
        } else{
            $user_image = $get_user_image['image'];
        }

        return $user_image;
    }

    function get_user_social_networks($user_id){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "SELECT * FROM user_media_lists WHERE user_id='$user_id'";
        $statement = $pdo->query($sql);
        $user_social_networks = $statement->fetch(PDO::FETCH_ASSOC);

        return $user_social_networks;
    }

    function add_user($email, $password){
        $password = password_hash($password, PASSWORD_DEFAULT);
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
        if( !empty($user) and password_verify($password, $user['password']) ){
            authorization($user);
            redirect_to('users.php');
            exit;
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
    
    function is_author($logged_user_id, $edit_user_id){
        if( $logged_user_id == $edit_user_id ){
            return true;
        } else{
            set_flash_message('danger', 'Можно редактировать только свой профиль');
            redirect_to('users.php');
            exit;
        }}

    
    function user_already_exist($user){
        if ( !empty( $user ) ){
            set_flash_message('danger', 'Пользователь с таким адресом эл.почты уже существует');
            redirect_to('create_user.php');
            exit;
        }}

    function email_is_not_free($edit_email, $user_email, $user_id){
        if( get_user_by_email($edit_email) != null && $edit_email !== $user_email ){
            set_flash_message('danger', 'Пользователь с таким адресом эл.почты уже существует');
            redirect_to("security.php?id=$user_id");
            exit;
        }
    }

    function add_user_info($name, $profession, $phone, $address, $user_id){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "INSERT INTO user_info_lists (name, profession, phone, address, user_id) VALUES ('$name', '$profession', '$phone', '$address', '$user_id')";
        $statement = $pdo->prepare($sql);
        $statement->execute();}

    function edit_user_info($name, $profession, $phone, $address, $user_id){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "UPDATE user_info_lists SET name='$name', profession='$profession', phone='$phone', address='$address' WHERE user_id='$user_id'";
        $statement = $pdo->prepare($sql);
        $statement->execute();}

    function get_user_status($user_id){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "SELECT * FROM user_status_list WHERE user_id='$user_id'";
        $statement = $pdo->query($sql);
        $user_status = $statement->fetch(PDO::FETCH_ASSOC);

        return $user_status;
    }

    function set_user_status($status, $user_id){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "INSERT INTO user_status_list (status, user_id) VALUES ('$status', '$user_id')";
        $statement = $pdo->prepare($sql);
        $statement->execute();}

    function edit_user_status($status, $user_id){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "UPDATE user_status_list SET status='$status' WHERE user_id='$user_id'";
        $statement = $pdo->prepare($sql);
        $statement->execute();
    }
    
    function add_user_image($image, $user_id){
        $image_name = uniqid() . '.' . end(explode('.', $image['name']));
        $file_directory = 'user_images/' . $image_name;
        move_uploaded_file($image['tmp_name'], $file_directory);
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "INSERT INTO user_image_list (image, user_id) VALUES ('$file_directory', '$user_id')";
        $statement = $pdo->prepare($sql);
        $statement->execute();}

    function edit_user_image($image, $user_id){
        $image_name = uniqid() . '.' . end(explode('.', $image['name']));
        $file_directory = 'user_images/' . $image_name;
        move_uploaded_file($image['tmp_name'], $file_directory);
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "UPDATE user_image_list SET image='$file_directory' WHERE user_id='$user_id'";
        $statement = $pdo->prepare($sql);
        $statement->execute();
    }

    function add_user_social_networks($vk, $tg, $inst, $user_id){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "INSERT INTO user_media_lists (vk, tg, inst, user_id) VALUES ('$vk', '$tg', '$inst', '$user_id')";
        $statement = $pdo->prepare($sql);
        $statement->execute();}

    function edit_credentials($user_id, $user_email, $user_password){
        $password = password_hash($user_password, PASSWORD_DEFAULT);
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');
        $sql = "UPDATE users SET email='$user_email', password='$password' WHERE id='$user_id'";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        set_flash_message('success', 'Профиль успешно обновлен');
        redirect_to("page_profile.php?id=$user_id");
    }

    function delete_user($user_id){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=part1', 'root', '');

        $sql = "DELETE FROM user_image_list WHERE user_id='$user_id'";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $sql = "DELETE FROM user_info_lists WHERE user_id='$user_id'";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $sql = "DELETE FROM user_media_lists WHERE user_id='$user_id'";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $sql = "DELETE FROM user_status_list WHERE user_id='$user_id'";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $sql = "DELETE FROM users WHERE id='$user_id'";
        $statement = $pdo->prepare($sql);
        $statement->execute();
    }

    function logout(){
        unset($_SESSION['user']);
        redirect_to('page_register.php');
        exit;
    }
?>