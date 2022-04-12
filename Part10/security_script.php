<?php
    session_start();
    require('functions.php');

    
    $user_email = $_SESSION['user']['email'];
    $edit_user_id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    email_is_not_free($email, $user_email, $edit_user_id);
    edit_credentials($edit_user_id, $email, $password);
?>