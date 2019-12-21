<!DOCTYPE html>
<html>
<head>
    <title>EDT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="icon" type="image/png" href="l.ico">  
  <link rel="stylesheet" href="style.css">
</head>
<body>

    <a href="index.php"><img src="l.png" height="200px" width="200px" ></a>
<ul><big>
  <li style="float:right"><a class="active" href="contact.php">Contact</a></li>
  <li style="float:right"><a class="active" href="propos.html">A propos</a></li>
  <li style="float:right"><a class="active" href="aide.html">Aide</a></li>
  <li style="float:right"><a class="active" href="index.php">Acceuil</a></li> 
  </big>
</ul>
    
<!--form method="get" action="connect.php">
<fieldset><legend>Login : </legend><input type="text" name="login"/></fieldset>
<fieldset><legend>Mot de passe : </legend><input type="password" name="motdepasse"/></fieldset>
<input type="submit" name="submit" value="Se connecter"/>
</form-->
<!--h1 class="hdra"><big>EDT</big></h1-->

<?php
//error_reporting(E_ALL | E_ALL);

$host="localhost";
$user="root";
$password="";
$data="edt2";
$link = mysqli_connect( 'localhost', 'root', '','edt2');


$connection = mysqli_connect($host,$user,$password,$data);
if(!$connection) die("Data Base Error");


 // session_start();  
  session_start();
   if($_SERVER['REQUEST_METHOD']=="POST")    {
     $user=$_POST['user'];
     $pass=$_POST['pass'];
     
     $query="select * from val_ens where nom= '". $user ."' AND password_ens= '". $pass ."'";
     $result=  mysqli_query($connection, $query);
    // if($result){
     //$_SESSION['user']=$user;
     //$_SESSION['pass']=$pass;
      //$numrows = mysqli_num_rows($query);  
    if( $result)  
    {  
    while($row=mysqli_fetch_assoc($result))  
    {  
    $dbusername=$row['nom'];  
    $dbpassword=$row['password_ens'];  
    $typ=$row['type'];
    }  
  
    if($user == $dbusername && $pass == $dbpassword)  
    {  
     //echo "string";
    $_SESSION['user']=$user; 
    $_SESSION['pass']=$pass; 
      if ($typ=='chef') {
        
     
     header('location:base1.php'); }
      else if ($typ=='enseignant') {
       header('location:prof.php');
      }
      else{header('location:etud.php');
       $niv = $row['niv']; 
      $sec = $row['sec'] ; 
       $grb = $row['grb'];; 

      $_SESSION['niv']=$niv; 
    $_SESSION['sec']=$sec; 
    $_SESSION['grb'] = $grb;  
    }
    }
       else {  header('location:index.php?err=invalide data ');
             
      echo "<script type='text/javascript'>";
      echo "invakid";
      echo "</script>";

      }

   }}


?>

<div class="login">
  <br>
  <h2 class="titr"> Connectez !</h2>

  <form  method="POST">

  <input type="text" placeholder="User Name" id="Email" name="user" required>  
  <input type="password" placeholder="Mot de passe" id="password" name="pass" required>  
 
  <input type="submit" value="Connexion" class="submit" style="margin-top: 25px;"> 


  </form>


<div class="shadow"></div></div>


</body>
</html>