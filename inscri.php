<!DOCTYPE html>
<html>
<head>
  <title>Incription </title>
   <link rel="stylesheet" href="pro.css">

  
<style>
  input, select {
  /*width: 50%;*/
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.form{

    padding: 12px 100px;
    margin: 80px ;
    border: 10px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

</style>
</head>
<body>
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">RVE</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Accueil</a></li>
      <li><a href="#">Aide</a></li>
      <li><a href="#">A propos</a></li>
      <li><a href="#">Contact</a></li>
      
    </ul>
  </div>
</nav>



<?php

$nomErr = $prenomErr = $emailErr = $teleErr = $universiteErr = $departementErr =$passErr = $cpassErr = "";
$nom = $prenom = $email = $telephone = $universite = $departement ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nom"])) {
    $nomErr = "Le nom est obligatoire";
  } else {
    $nom = test_input($_POST["nom"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$nom) || strlen($nom)<4 || strlen($nom)>10) {
      $nomErr = "Format de nom invalide";
    }

  }

  if (empty($_POST["prenom"])) {
    $prenomErr = "Le prénom est obligatoire";
  } else {
    $prenom = test_input($_POST["prenom"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$prenom) || strlen($prenom)<4 || strlen($prenom)>10) {
      $prenomErr = "Seules les lettres et les espaces sont autorisés";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email est obligatoire";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Format d'email invalide";
    }
  }
    
  if (empty($_POST["telephone"])) {
    $teleErr = "Telephone est obligatoire" ;
  } else {
    $telephone = test_input($_POST["telephone"]); 
  if (!preg_match("/[^0-9]*$/",$telephone) || strlen($telephone) != 10) {
      $teleErr = "Format de telephone invalide " ;
       }
  }

  if (empty($_POST["departement"])) {
    $departementErr = "departement est obligatoire";
  } else {
    $departement = test_input($_POST["departement"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$departement) || strlen($departement)<6 || strlen($departement)>10) {
      $departementErr = "Format invalide ";
    }
  }

  if (empty($_POST["universite"])) {
    $universiteErr = "universite est obligatoire";
  } else {
    $universite = test_input($_POST["universite"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$universite) || strlen($universite)<6 || strlen($universite)>10) {
      $universiteErr = "Format invalide ";
    }
  }
 
 if (empty($_POST["pass"])) {
    $passErr = "Donner un mot de passe ";
  } else {
    $pass = test_input($_POST["pass"]) ;
    if (!preg_match("/^[a-zA-Z0-9]*$/",$pass) || strlen($pass)<4 || strlen($pass)>10) {
      $passErr = "Mot de passe invalide";
    }
  }

 if (empty($_POST["cpass"])) {
    $cpassErr = "Confirmer le mot de passe ";
  } else {
    $cpass = test_input($_POST["cpass"]) ;
    if ($_POST["cpass"] != $_POST["pass"] ) {
      $cpassErr = "Mot de passe non confirme";
    }
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="form">
<h2>Inscription : </h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Nom: <input type="text" name="nom" maxlength="10" value="<?php echo $nom;?>">
  <span class="error"> <?php echo "*".$nomErr;?></span>
  <br><br>
   Prénom : <input type="text" name="prenom" maxlength="10" value="<?php echo $prenom;?>">
  <span class="error"> <?php echo "*".$prenomErr;?></span>
  <br><br>
  E-mail: <input type="email" name="email" value="<?php echo $email;?>" autocomplete="off" >
  <span class="error"> <?php echo "*".$emailErr;?></span>
  <br><br>
  Telephone : <input type="text" name="telephone" maxlength="10" value="<?php echo $telephone;?>">
  <span class="error"><?php echo "*".$teleErr;?></span>
  <br><br>
  Université: <input type="text" name="universite" value="<?php echo $universite;?>">
  <span class="error"><?php echo "*".$universiteErr;?></span>
  <br><br>
  Département :<input list="departement" name="departement" >
<datalist id="departement">
  <option value="Math et Informatique">
  <option value="Science de la matiere">
  <option value="Science de la nature et de vie">
  </datalist>
  <span class="error"><?php echo "*".$departementErr;?></span>
  <br><br>
  Mot de Passe : <input type="password" name="pass" maxlength="10">
   <span class="error"><?php echo "*".$passErr;?></span>
  <br><br>
  Confirmer le mot de passe : <input type="password" name="cpass" maxlength="10">
    <span class="error"><?php echo "*".$cpassErr;?></span>
  <br><br>
  <input type="submit" name="valider" value="Valider">
  <input type="reset" name="effacer" value="Effacer">     
</form>
</div>

</body>
</html>