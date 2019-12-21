<?php

require "mysql.php" ;
require "activité.php" ;
$id = $_GET['id'];
$val = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
$isvalid = filter_var($val, FILTER_VALIDATE_INT);
 
if (empty($id)) {
 echo "Id is invalid";
}  
echo '  
<div class="table-responsive" style ="margin-top:0px;width:500px;margin-left:5px">          
        <table class="table">
   <tr>
       
      ';

echo '<td>'.'<form method= post >'
.'<td>' ;
    
    $sql = "SELECT name_t FROM teacher ; "; 
    $res = mysqli_query($connection,$sql)or die("invalid ");
    echo "<select name='ens'>";
    if ($res) {
 while($row = mysqli_fetch_array($res)){
  
  echo "<option>".$row['name_t'];
  echo "</option>";

   }}
   echo "</select>";
   echo '</td>' ;
echo '<td>';
 $sql2 = "SELECT name_s FROM subject ; "; 
    $res2 = mysqli_query($connection,$sql2)or die("invalid ");
    echo "<select name='module'>";
    if ($res) {
 while($row = mysqli_fetch_array($res2)){
  
  echo "<option>".$row['name_s'];
  echo "</option>";

   }}
   echo "</select>";
echo '</td>';
echo '<td>';
$sql = "SELECT id_year,name_year FROM year ; "; 
    $res = mysqli_query($connection,$sql)or die("invalid ");
    echo "<select name='apr'>";
    if ($res) {
 while($row = mysqli_fetch_array($res)){
  
  echo "<option>".$row['name_year'];
  echo "</option>";

   

   $sql2 = "SELECT id_groupe,name_g FROM groupe where id_year = '".$row['id_year']."'; "; 
    $res2 = mysqli_query($connection,$sql2)or die("invalid ");
    
    if ($res2) {
 while($row2 = mysqli_fetch_array($res2)){
   


  echo "<option>".$row2['name_g'];
  echo "</option>";


  $sql3 = "SELECT name_sub_g FROM sub_groupe where id_groupe = '".$row2['id_groupe']."'; "; 
    $res3 = mysqli_query($connection,$sql3)or die("invalid ");
    
    if ($res3) {
 while($row3 = mysqli_fetch_array($res3)){
  
  echo "<option>".$row3['name_sub_g'];
  echo "</option>";

   }}
   }}

   }}

   


   echo "</select>";
echo '</td>' 
.'<td>'.'<select name="cod"><option>C</option><option>TD</option><option>TP</option></select>'.'</td>'
.'<td>'.'<select name="dure"> <option>1</option> <option>2</option></select>'.'</td>'
.'<td>'.'<input type="submit" name=submit style ="margin-left:80px" class="bu">'.'</td>' ; 
echo '</form>';

echo '
</td>
</tr>
  </table>
  </div>';

if (isset($_POST['submit'])) {
  if(isset($_POST['ens']) && isset($_POST['module']) && isset($_POST['apr']) && isset($_POST['cod']) && isset($_POST['dure'])){

$ens = $_POST['ens'] ;
$mod = $_POST['module'] ;
$apr = $_POST['apr'] ;
$cod = $_POST['cod'];
$dure = $_POST['dure'];

$sql = "UPDATE activity SET name_t= '". $ens ."' , name_s= '". $mod ."' , id_tag= '". $cod ."' , id_student= '". $apr ."' , dure= '". $dure ."' WHERE id_activity = '". $id ."' ;"; 

$res = mysqli_query ($connection,$sql);
if ($res) {
   //echo "val delet";
 //include "Matieres.php" ;
// header('location:Matieres.php');

	echo "<script> location.replace('activité.php'); </script>" ;
  }
  else echo "false ";
}}




?>

