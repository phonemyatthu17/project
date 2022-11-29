<?php
    
    session_start();

    if(!isset($_SESSION['user'])) {
        header('location: index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-3">Phone Myat Thu (Frontend Developer)</h1>

    <?php if(isset($_GET['error'])): ?>
        <div class="alert alert-warning">
            Cannot upload file
        </div>
    <?php endif ?>    

    <?php if(file_exists('_actions/photos/profile.jpg')): ?>
        <img class="img-thumbnail mb-3" src="_actions/photos/profile.jpg" alt="Profile Photo" width="200">
    <?php endif ?>    

    <form action="_actions/upload.php" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <input type="file" name="photo" class="form-control">
            <button class=" btn btn-secondary">Upload</button>
        </div>
    </form>

        <ul class="list-group">
            <li class="list-group-item">
                <b>Email:</b> phonemyatthu@gmail.com
            </li>
            <li class="list-group-item">
                <b>Phone:</b> (09) 325 540 402
            </li>
            <li class="list-group-item">
                <b>Address:</b> No. 334 , Daisy Street,Strawberry City
            </li>
        </ul>
        <br>

        <a href="_actions/logout.php">Logout</a>
    </div>
</body>
</html>