<?php
/*
	myCMSAlph databace installer
*/

// define variables and set to empty values
$servername = $username = $password = $databasename = '';
if ($_SERVER["REQUEST_METHOD"] == "POST"):
	$servername = test_input($_POST["hostname"]);
	$username = test_input($_POST["username"]);
	$password = test_input($_POST["password"]);
	$databasename = test_input($_POST["databasename"]);
endif;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function form_output($a,$b,$c,$d){
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"):
		$servername = $a;
		$username = $b;
		$password = $c;
		$databasename = $d;
		

		$conn = new mysqli($servername, $username, $password);	// Create connection

		if (!$conn): 											// Check connection
			die("Connection failed: " . mysqli_connect_error());
		endif;
		// Create database
		$sql = "CREATE DATABASE IF NOT EXISTS $databasename";	

		$query = "CREATE TABLE articles(
			id smallint unsigned NOT NULL AUTO_INCREMENT,
			PRIMARY KEY (id),
			publicationDate date NOT NULL,                              
			title varchar(255) NOT NULL,                      
			summary text NOT NULL,                              
			content mediumtext NOT NULL)";

		mysqli_set_charset( $conn, 'utf8');
		
		// Create a MySQL database	
		if ($conn->query($sql) === TRUE):		
			echo "Database ".$databasename." created successfully <br />";			
		else:
			exit("Error creating database: " . mysqli_error($conn));
		endif;
		
		$conn = new mysqli($servername, $username, $password, $databasename);	// Create connection
		// Create a MySQL table in the selected database	
		if ($conn->query($query) === TRUE):
			echo "Table created successfully";
		else:
			exit("Error creating database: " . mysqli_error($conn)) ;
		endif;
		
		mysqli_close($conn);
		
	endif;
	
}
?>

<?php 	include '../template/head.html';	?>
		
<?php 	include '../template/navbar.html';?>
		

		<!-- form container -->
<div class="container">



	<form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<h2 class="form-signin-heading">Database install</h2>

		<label for="inputServerName">Server Name</label>
		<input type="text" id="inputText" class="form-control" name="servername" placeholder="mySQL ServerName" required autofocus>

		<label for="inputUserName">Username</label>
		<input type="text" id="inputText" class="form-control" name="username" placeholder="mySQL Username" required>

		<label for="inputPassword">Password</label>
		<input type="password" id="inputPassword" class="form-control" name="password"  placeholder="mySQL Password" autocomplete="new-password">

		<label for="inputDatabase" >Database Name</label>
		<input type="text" id="inputText" class="form-control" name="databasename" placeholder="myCMSalpha" required>
		<button class="btn btn-lg btn-primary btn-block" name="Submit" type="submit">Submit</button>
		
		<div><h3><?php form_output($servername,$username,$password,$databasename); ?></h3></div>
	</form>
</div> 
<!-- /form container -->


<?php include '../template/foot.html';	?>