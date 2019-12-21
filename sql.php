<?php
$host="localhost";
$user="root";
$password="";
$data="fet2";

$link = mysqli_connect( 'localhost', 'root', '','fet');


$connection = mysqli_connect($host,$user,$password,$data);
if(!$connection) die("Data Base Error");

?>