
<?php

error_reporting(E_ALL | E_ALL);
require "mysql.php" ;
if(isset($_POST["submit"])){  
if(!empty($_POST['user']) && !empty($_POST['pass']))
 { 
    $user=$_POST['user'];  
    $pass= md5($_POST['pass']);  

  $quiry="   INSERT INTO acount (ID,Name,Password)  VALUES  (NULL,'".$user."', '".$pass."'); ";
  $result = mysqli_query($connection,$quiry);
   
  if($result) echo "insert valide".mysqli_insert_id($connection) ;
}}

//mysql_close($connection);
 



?>

<!DOCTYPE html>
<html>
<head>
    <title>Add</title>
    <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<br><br><br><br><br><br><br><br>
	<div class="login"><br><br>
<form method= POST >
<p>User :</p><input type=text name=user>

<p>Password: </p><input type=password name=pass>
 <input type=Submit  name=submit value=ADD information>
</form>
<div class="shadow"></div>
</div>
</body>
</html>

