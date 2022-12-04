<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$table = new UsersTable(new MySQL);
$data = [
    "name" => $_POST['name'],
    "email" => $_POST['email'],
    "phone" => $_POST['phone'],
    "address" => $_POST['address'],
    "password" => $_POST['password'],
];
$id = $table->insert($data);

if($id) {
    header("location: ../index.php?register=success");
} else {
    header("location: ../register.php?error=1");
}