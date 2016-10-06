<?php
// start session cookies
session_start();

if(isset($_POST['username'])&&isset($_POST['password'])){
	// action for successful login
	if($_POST['username']=='admin' && $_POST['password']=='admin'){
		echo'login successful <BR />';
		echo'<a href="?logout">Logout</a>';
		exit;
	}
	
	// action for unsuccessful login
	if($_POST['username']!='admin' || $_POST['password']!='admin'){
		session_unset();
		echo'Invalid login ';
		echo'<BR \><a href=\'login.php\'>Try again</a \> ';
		exit;
		}
}
?>

<?php

// Logout via get method
if(isset($_GET["logout"])){
	session_unset();
	session_destroy();
	echo 'logged out';
	echo'<BR \><a href=\'login.php\'>Log in again</a \> ';
	exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>Login</title>
	</head>
	<body>

	</body>
</html>
		<form action="login.php" method="post">
		Username:<input type="text" name="username" id="username">
		Password:<input type="password" name="password" id="password">
		<input type="submit" value="Login">
		</form>
		
</body>
</html>