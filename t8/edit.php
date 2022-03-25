
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
                <h3>Edit</h3>
                <div class="row">
                <?php

                    $pdo = new PDO('mysql:host=localhost;dbname=task8', 'root', '');
                    $sql = 'SELECT * FROM users WHERE id=:id';
                    $statement = $pdo->prepare($sql);
                    $statement->execute($_GET);
                    $user = $statement->fetch(PDO::FETCH_ASSOC);

                ?>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="update.php" method="post">
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $user['id']; ?>"><br/>
                                    <b>First Name:</b> 
                                    <input type="text" name="FirstName" class="form-control" value="<?php echo $user['FirstName']; ?>"><br/>
                                    <b>Last Name:</b> 
                                    <input type="text" name="LastName" class="form-control" value="<?php echo $user['LastName']; ?>"><br/>
                                    <b>Username:</b> 
                                    <input type="text" name="Username" class="form-control" value="<?php echo $user['Username']; ?>"><br/>
                                    <button type="submit" class="btn btn-warning" style="margin-top: 10px" >Edit user</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>