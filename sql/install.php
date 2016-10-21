<?php 	include dirname(__FILE__) . '/template/head.html';	?>
<?php
/*
	myCMSAlph databace installer
	Copyright © 2016 Joseph Collen Turner
*/

//display errors if they exist SET TO false on live site.
ini_set( "display_errors", TRUE );				 

function set_input($data) {
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

		if (!$conn): // Check connection
			die("<div class=\"alert alert-danger\" role=\"alert\">Connection failed: " . mysqli_connect_error()."</div>");
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
			echo "<div class=\"alert alert-success\" role=\"alert\">Database ".$databasename." created successfully</div>";			
		else:
			exit("<div class=\"alert alert-danger\" role=\"alert\">Error creating database: " . mysqli_error($conn) . '</div>');
		endif;
		
		$conn = new mysqli($servername, $username, $password, $databasename);	// Create connection
		// Create a MySQL table in the selected database	
		if ($conn->query($query) === TRUE):
			echo "<div class=\"alert alert-success\" role=\"alert\">Table created successfully</div>";
		else:
			exit('<div class="alert alert-danger" role="alert">Error creating table: ' . mysqli_error($conn) . '</div \>') ;
		endif;
	
		$conn = new mysqli($servername, $username, $password, $databasename);
		if ($conn):	
			$configfile = fopen("assets/config.php", "w") or die("<div class=\"alert alert-danger\" role=\"alert\">Unable to create file!</div>");
			$text = '<?php
// List of Supported Timezones http://www.php.net/manual/en/timezones.php
date_default_timezone_set( "America/Chicago" );  
//database configurations 
$DB_SERVERNAME = "'.$servername.'"; 		// mySQL Database host address
$DB_USERNAME = "'.$username.'";				// database username
$DB_PASSWORD = "'.$password.'";				// database password	
$CMS_NAME = "'.$databasename.'";			// Name of the database	
?>';
			fwrite($configfile, $text);
			fclose($configfile);
			
			echo '<div class="alert alert-success" role="alert">Configuration file created successfully</div>';
		endif;
	
		mysqli_close($conn);
		
	endif;
	
}
// define variables and set to empty values
$servername = $username = $password = $databasename = '';
	if ($_SERVER["REQUEST_METHOD"] == "POST"):
		$servername = set_input($_POST["servername"]);
		$username = set_input($_POST["username"]);
		$password = set_input($_POST["password"]);
		$databasename = set_input($_POST["databasename"]);
	endif;
?>



<!-- form container -->
<div class="container col-md-4 col-md-offset-4">
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<h3 class="panel-title">Database install</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="form-group col-md-12">
					<form class="form-signin" action="<?php echo set_input($_SERVER["PHP_SELF"]);?>" method="post">
						<label for="inputServerName">Server Name</label>
						<input type="text" id="inputText" class="form-control" name="servername" placeholder="mySQL ServerName" required autofocus>
						<label for="inputUserName">User Name</label>
						<input type="text" id="inputText" class="form-control" name="username" placeholder="mySQL Username" required>
						<label for="inputPassword">Password</label>
						<input type="password" id="inputPassword" class="form-control" name="password"  placeholder="mySQL Password" autocomplete="new-password">
						<label for="inputDatabase" >Database Name</label>
						<input type="text" id="inputText" class="form-control" name="databasename" placeholder="myCMSalpha" required>
						<label for="inputsubmit" ></label>
						<button class="btn btn-primary btn-block" name="Submit" type="submit">Submit</button>			
					</form>
				</div>
			</div>
			<div class="row">
				<?php form_output($servername,$username,$password,$databasename); ?>
			</div>
		</div>
	</div>
</div>	
<!-- /form container -->


<?php include 'template/foot.html';	?>