<?php

require "mysql.php" ;

include "Enseignants.php";
$id = $_GET['id'];

$val = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
$isvalid = filter_var($val, FILTER_VALIDATE_INT);
 
if (empty($id)) {
 echo "Id is invalid";
}  
echo '  
<div class="table-responsive" style ="margin-top:80px;width:500px;margin-left:20px">          
        <table class="table">
   <tr>
       
      ';

echo '<td>'.'<form method= post >'.'<input type="text" name="module" placeholder="modifier enseignant" style ="margin-top:0px" required>'.'<td>'.'<input type="text" name="m_q" placeholder="modifier matiere qualifie" style ="margin-top:0px" required>'.'</td>'.'<td>'.'<input type="submit" name=submit style ="margin-left:80px" class="bu">'.'</td>' ;
echo '</form>';

echo '
</td>
</tr>
  </table>
  </div>';

if (isset($_POST['submit'])) {
  if(isset($_POST['module'])){


$nom_m = $_POST['module'] ;
$m_q = $_POST['m_q'];

$sql = "UPDATE teacher SET name_t= '". $nom_m ."' , matiere_qualifie= '". $m_q ."' WHERE id_t = '". $id ."' "; 

$res = mysqli_query ($connection,$sql);
if ($res) {
   
  echo "<script>location.replace('Enseignants.php');</script>";
  }
  else echo "false ";
}}
?>