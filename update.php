<?php

require "mysql.php" ;
require "Matieres.php" ;
$id = $_GET['id'];
$val = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
$isvalid = filter_var($val, FILTER_VALIDATE_INT);
 
if (empty($id)) {
 echo "Id is invalid";
}  
echo '  
<div class="table-responsive" style ="margin-top:-100px;width:500px;margin-left:-40px">          
        <table class="table">
   <tr>
       
      ';

echo '<td>'.'<form method= post >'.
 '<input type="text" name="module" placeholder="modifier le module" style ="margin-top:0px" required>'.'<td>'.
 '<input type="text" name="sp" placeholder="modifier la specialite" style ="margin-top:0px" required>'.'</td>'.
 '<td>'.
 '<input type="text" name="nb_c" style ="margin-top:0px;width:80px;" >'.'</td>'.
 '<td>'.
 '<input type="text" name="nb_d" style ="margin-top:0px;width:80px;" >'.'</td>'.
 '<td>'.
 '<input type="text" name="nb_p" style ="margin-top:0px;width:80px;" >'.'</td>'.
 '<td>'.
 '<input type="submit" name=submit style ="margin-left:80px" class="bu">'.
  '</td>' ; 
echo '</form>';

echo '
</td>
</tr>
  </table>
  </div>';

if (isset($_POST['submit'])) {
  if(isset($_POST['module']) && isset($_POST['sp'])){


$nom_m = $_POST['module'] ;
$nom_sp = $_POST['sp'] ;
$nb_c=$_POST['nb_c'];
    $nb_d=$_POST['nb_d'];  
    $nb_p=$_POST['nb_p'];

$sql = "UPDATE subject SET name_s = '". $nom_m ."' , specialite = '". $nom_sp ."' , nb_c = '". $nb_c ."', nb_d = '". $nb_d ."', nb_p = '". $nb_p ."' WHERE id_s = '". $id ."' ;"; 

$res = mysqli_query ($connection,$sql);
if ($res) {
   //echo "val delet";
 //include "Matieres.php" ;
// header('location:Matieres.php');

	echo "<script> location.replace('Matieres.php'); </script>" ;
  }
  else echo "false ";
}}




?>