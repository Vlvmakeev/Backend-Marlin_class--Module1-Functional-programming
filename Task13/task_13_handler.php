<?php
    session_start();
    if (isset($_POST['id'])) {
        $_SESSION['i']++;
        header('Location: /task_13.php');
        exit;
    }
    header('Location: /task_13.php');

?>