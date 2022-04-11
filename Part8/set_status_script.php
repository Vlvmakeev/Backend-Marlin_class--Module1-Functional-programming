<?php
    session_start();
    require('functions.php');

    $edit_user_id = $_POST['id'];
    $edit_user_status = $_POST['status'];

    if( get_user_status($edit_user_id) == null ){
        set_user_status($edit_user_status, $edit_user_id);
    }else{
        edit_user_status($edit_user_status, $edit_user_id);
    }

    set_flash_message('success', 'Профиль успешно обновлен');
    redirect_to("page_profile.php?id=$edit_user_id");
?>