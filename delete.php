<?php

require "mysql.php" ;
$id = $_GET['id'];

$val = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
$isvalid = filter_var($val, FILTER_VALIDATE_INT);
 
if (empty($id)) {
 echo "Id is invalid";
}

$query = "DELETE FROM subject WHERE id_s= '". $id ."'  ";

//sends the query to delete the entry
$res = mysqli_query ($connection,$query);
if ($res) {
   
  header('location:Matieres.php');
  }
  else echo "false ";
?>