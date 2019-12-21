<?php

  session_start(); 
   if($_SERVER['REQUEST_METHOD']=="POST")    {
	   $user=$_POST['usern'];
	   $password=$_POST['pass'];
	   if(($user=="sarah")&&(  $password=="1998")){
	   $_SESSION['user']=$user;
	   header('location:base1.php');}
       else header('location:login.php?err=invalide data ');
   }

   
?>
 <!DOCTYPE html>
<html>
<form  method="POST"  >
<table>
<tr>
<td>User Name :</td> <td><input type="text" name="usern"  />   </td></tr>

<tr>
<td>Password :</td> <td><input type="password" name="pass"  /> </td></tr>

  <tr>
<td><button>Log In  </button><?php echo "<br>".$_GET['err'] ;?> </td></tr>


</table>
</form></html>