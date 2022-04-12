<?php
    session_start();
    require('functions.php');
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $profession = $_POST['profession'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    
    
    edit_user_info($name, $profession, $phone, $address, $id);

    set_flash_message('success', 'Профиль успешно обновлен.');
    redirect_to("edit.php?id=$id");
    exit;
    
?>