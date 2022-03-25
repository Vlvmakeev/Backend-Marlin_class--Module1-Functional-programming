<?php
    
    $pdo = new PDO('mysql:host=localhost;dbname=task8', 'root', '');
    $sql = "INSERT INTO `users` (`id`, FirstName, LastName, `Username`) VALUES (NULL, :FirstName, :LastName, :Username)";
    $statement = $pdo->prepare($sql);
    $statement->execute($_POST);


    header('Location: /task_8.php');

?>