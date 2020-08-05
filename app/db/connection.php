<?php


$host = 'localhost';
$user = 'root';
$password = 'root';
$db_name = 'blog';

$conn = new MysQLi($host,$user,$password,$db_name);

if($conn->connect_error){
    die('Database Conection error:' . $conn->connect_error);
}




