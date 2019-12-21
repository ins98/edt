    <!DOCTYPE html>
    <html>
      <head>
        <title>CONTACTEZ-NOUS</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" href="stylecontact.css">
        <link rel="icon" type="image/png" href="l.ico">  
        
      </head>
      <body>
    <a href="index.php"> <img class="logo" src="l.png" height="200px" width="200px" > </a>
        <ul><big>
  <li style="float:right"><a class="active" href="contact.php">Contact</a></li>
  <li style="float:right"><a class="active" href="propos.html">A propos</a></li>
  <li style="float:right"><a class="active" href="aide.html">Aide</a></li>
  <li style="float:right"><a class="active" href="index.php">Acceuil</a></li> 
  </big>
</ul> 
 <form method="post" action="<?php echo strip_tags($_SERVER['REQUEST_URI']); ?>">
  <h1 class="titre">Restez en contact avec nous</h1>
    <input name="name" placeholder="Votre Nom *" class="name" size="30" required />
    <input name="name" placeholder="Departement *" class="dep" size="30" required />
    <input name="emailaddress" placeholder="Votre Email *" class="email" type="email" size="30" required />
    <textarea rows="4" cols="50" name="subject" placeholder="Votre message *" class="message" required></textarea>
    <input name="submit" class="btn" type="submit" value="Send" />
</form>
      </body>
    </html>
