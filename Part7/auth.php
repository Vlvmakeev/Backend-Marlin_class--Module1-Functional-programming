<?php
    session_start();
    require('functions.php');

    $login = $_POST['username'];
    $password = $_POST['password'];

    verify($login, $password);
    
?>