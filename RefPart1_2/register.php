<?php
    session_start();
    require 'functions.php';
    
    $email = $_POST['emailverify'];
    $password = $_POST['userpassword'];

    $user = get_user_by_email($email);

    if( !empty($user) ){
        set_flash_message('danger', '<strong>Уведомление!</strong> Этот эл. адрес уже занят другим пользователем.');
        redirect_to('page_register.php');
        exit;
    }else{
        add_user($email, $password);
        set_flash_message('success', 'Регистрация успешна');
        redirect_to('page_login.php');
        exit;
    }
    
?>