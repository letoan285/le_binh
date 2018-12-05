<?php 
$host = "127.0.0.1";
$username = "root";
$pass = "";
$dbName = "hvcg_db_binh";
try{
    $conn = new PDO("mysql:host=$host; dbname=$dbName; charset=utf8", $username, $pass);
}catch (PDOException $e){
    var_dump($e->getMessage);die;
}

function dd($var){
    var_dump($var);die;
}