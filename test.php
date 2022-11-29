<?php

include("vendor/autoload.php");

use Libs\Database\MySQL;

$mysql = new MySQL;
$db = $mysql->connect();

$result = $db->query("SELECT * FROM roles");
$rows = $result->fetchAll();

print_r($rows);