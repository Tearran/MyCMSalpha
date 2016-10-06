<?php
// start session cookies
session_start();

if(isset($_POST['username'])&&isset($_POST['password'])){
	if($_POST['username']=='admin' && $_POST['password']=='admin'){
		echo' Valid login';
	}
	else{echo'Invalid login';}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
.gitignore
<title>Page Title</title>
</head>
<body>
		<form action="login.php" method="post">
		Username:<input type="text" name="username" id="username">
		Password:<input type="password" name="password" id="password">
		<input type="submit" value="Login">
		</form>

</body>
</html>