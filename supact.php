<?php

require "mysql.php" ;
$id = $_GET['id'];

$val = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
$isvalid = filter_var($val, FILTER_VALIDATE_INT);
 
if (empty($id)) {
 echo "Id is invalid";
}

$query = "DELETE FROM activity WHERE id_activity= '". $id ."'  ";

//sends the query to delete the entry
$res = mysqli_query ($connection,$query);
if ($res) {
   
  header('location:activité.php');
  }
  else echo "false ";
?>