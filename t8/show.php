
<?php

$pdo = new PDO('mysql:host=localhost;dbname=task8', 'root', '');
$sql = 'SELECT * FROM users WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->execute($_GET);
$user = $statement->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Просмотр пользователя</h3>
                <b>ID:</b> <?php echo $user['id']; ?> <br/>
                <b>First Name:</b> <?php echo $user['FirstName']; ?> <br/>
                <b>Last Name:</b> <?php echo $user['LastName']; ?> <br/>
                <b>Username:</b> <?php echo $user['Username']; ?>
            </div>
        </div>
    </div>
</body>
</html>