<?php
    

    for( $i = 0; $i < count($_FILES['image']['name']); $i++ ){
        $file_info = pathinfo($_FILES['image']['name'][$i]);
        $file_extansion = $file_info['extension'];
        $file_path = $_FILES['image']['tmp_name'][$i];
        upload($file_path, $file_extansion);
    }

    function upload($file_path, $file_extansion){
        $upload = $file_path;
        $rename = 'user_img/' . uniqid() . '.' . $file_extansion;
        move_uploaded_file($upload, $rename);

        $pdo = new PDO('mysql:host=localhost;dbname=task152', 'root', '');

        $sql = 'INSERT INTO images (image) VALUES (:image)';

        $statement = $pdo->prepare($sql);
        $statement->execute(['image' => $rename]);
    }
    
    header('Location: /task_15.php');

?>