
<?php

require "mysql.php" ;
if($_POST['submit']){
$user=$_POST['user'];
$pass=md5($_POST['pass']);
$quiry="   INSERT INTO acount (ID,Name,Password)  VALUES  (NULL,'".$user."', '".$pass."'); ";
$result = mysqli_query($connection,$quiry);
if($result) echo "insert valide".mysqli_insert_id($connection) ;
}

//mysql_close($connection);
 



echo "

<html>
<body>
<form method= POST >
User:<input type=text name=user><br>

Password:<input type=password name=pass><br>
ADD : <input type=Submit  name=submit value=Enter information>
</form>
</body>
</html>
" ;

?>