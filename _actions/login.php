<?php
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email === 'phonemyatthu@gmail.com' and $password === 'phone123') {
        $_SESSION['user'] = ['username' => 'Phone Myat Thu'];
        header('location: ../profile.php');
    } else {
        header('location: ../index.php?incorrect=1');
    }


?>