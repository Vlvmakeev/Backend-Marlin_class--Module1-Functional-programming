<?php
    session_start();
    require('functions.php');



    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $user_name = $_POST['name'];
    $user_profession = $_POST['profession'];
    $user_phone = $_POST['phone'];
    $user_address = $_POST['address'];
    $user_status = $_POST['status'];
    $user_vk = $_POST['vk'];
    $user_tg = $_POST['tg'];
    $user_inst = $_POST['inst'];

    $user_image = $_FILES['image'];

    $user_exist = get_user_by_email($user_email);

    user_already_exist($user_exist);
    $get_user_id = add_user($user_email, $user_password);
    add_user_info($user_name, $user_profession, $user_phone, $user_address, $get_user_id);
    set_user_status($user_status, $get_user_id);
    add_user_image($user_image, $get_user_id);
    add_user_social_networks($user_vk, $user_tg, $user_inst, $get_user_id);
    set_flash_message('success', 'Пользователь успешно добавлен');
    redirect_to('users.php');
?>