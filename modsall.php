<?php

require "mysql.php" ;

include "salles.php";
$id = $_GET['id'];

$val = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
$isvalid = filter_var($val, FILTER_VALIDATE_INT);
 
if (empty($id)) {
 echo "Id is invalid";
}  
echo '  
<div class="table-responsive" style ="margin-top:100px;width:500px;margin-left:10px">          
        <table class="table">
   <tr>
       
      ';

echo '<td>'.'<form method= post >'.'<input type="text" name="module" placeholder="modifier le module" style ="margin-top:0px" >'.'<td>'.'<select name="type_s" required><option>  </option><option>C</option><option>TD</option><option>TP</option></select>'.'</td>'.'<td>'.' <input type="text" name="capac" placeholder="insérer la capacité" style ="margin-top:0px" required>'.'</td>'.'<td>'.'<input type="submit" name=submit style ="margin-left:80px" class="bu">'.'</td>' ;
echo '</form>';

echo '
</td>
</tr>
  </table>
  </div>';

if (isset($_POST['submit'])) {
  if(isset($_POST['module']) && isset($_POST['type_s']) && isset($_POST['capac'])){


$nom_m = $_POST['module'] ;
$bld = $_POST['type_s'];
$cap = $_POST['capac'];

$sql = "UPDATE room SET name_sal= '". $nom_m ."' , type_s= '". $bld ."' , Capacity= '". $cap ."' WHERE id_sal= '". $id ."' ;"; 

$res = mysqli_query ($connection,$sql) or die("false");
if ($res) {
   
  echo "<script>location.replace('salles.php');</script>";

  }
  else echo "false ";
}}
?>