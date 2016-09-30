<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php
// define variables and set to empty values
$hostname = "";
$user = "";
$password = ""; 
$dbname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $hostname = install_input($_POST["hostname"]);
  $user = install_input($_POST["user"]);
  $password = install_input($_POST["password"]);
  $dbname = install_input($_POST["dbname"]);

}

function install_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="form">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 <div> mySQL hostame: <input type="text" name="hostname"> </div>

  <div>mySQL user name: <input type="text" name="user"> </div>

  <div>mySQL user password: <input type="text" name="password"></div> 

  <div>mySQL database name: <input type="text" name="dbname"> </div>
 
  <div><input type="submit" name="submit" value="Submit"></div>  
</form>

</div>
<?php

if (!empty($_POST)){
echo "<HR>";
echo $hostname;
echo "<br>";
echo $user;
echo "<br>";

if ($password){echo $password;
echo "<br>";
}

else{
	echo "No Password used!";
	echo "<br />";
}
echo $dbname;
echo "<br>";
};

?>

</body>
</html>