<?php
    session_start();
    require('functions.php');
    
    $user_id = $_POST['id'];
    $user_image = $_FILES['image'];

    if( get_user_image($user_id) == null){
        add_user_image($user_image, $user_id);
    } else{
        edit_user_image($user_image, $user_id);
    }

    set_flash_message('success', 'Профиль успешно обновлен');
    redirect_to("page_profile.php?id=$user_id");
?>