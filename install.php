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
<!-- basic form eliment -->
<div class="form">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		<div> mySQL hostame:</div>
		<div> <input type="text" name="hostname"></div>

		<div>mySQL user name:</div>
		<div><input type="text" name="user"></div>

		<div>mySQL user password:</div>
		<div><input type="text" name="password"></div> 

		<div>mySQL database name:</div>
		</div><input type="text" name="dbname"></div>
 
		<div><input type="submit" name="submit" value="Submit"></div> 	
	</form>
</div>

<?php
// If form is not empty
if (!empty($_POST)){
echo "<HR><div>".$hostname."</div>".$user."</div>";

if ($password){
	echo "<div>".$password."</div>";
}
if (empty($password)){
	echo "<div>No Password used!</div>";
}

echo "<div>".$dbname."</div>";

		};
?>


</body>
</html>
