<?php
    session_start();
    require('functions.php');

    $user = $_SESSION['user'];
    $logged_user_id = $user['id'];
    $edit_user_id = $_GET['id'];

    is_not_logged($user);
    

    delete_user($edit_user_id);

    if( $logged_user_id == $edit_user_id and $_SESSION['admin'] == null ){
        logout();
    }

    redirect_to('users.php');
?>