<?php
$host="localhost";
$user="root";
$password="";
$data="edt2";

$link = mysqli_connect( 'localhost', 'root', '','edt2');


$connection = mysqli_connect($host,$user,$password,$data);
if(!$connection) die("Data Base Error");






?>