<?php

$host="127.0.0.1:3306";
$user="root";
$password="";
$db = new mysqli($host, $user, $password) or
die($db->error);
$db->select_db("property");
?>