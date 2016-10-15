
<?php
// define variables and set to empty values
$hostname = $username = $password = $databasename = '';
if ($_SERVER["REQUEST_METHOD"] == "POST"):
	$hostname = test_input($_POST["hostname"]);
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

		$sql = "CREATE DATABASE $databasename"; 			// Create database

		if ($conn->query($sql) === TRUE):
			echo "Database created successfully";
		 		
		else:
			echo "Error creating database: " . mysqli_error($conn);
		endif;

mysqli_close($conn);
	endif;
	
}
?>

<?php 	include '../template/head.html';	?>
		<link href="../template/css/style.css" rel="stylesheet" type="text/css">
<?php 	include '../template/navbar.html';?>
		

		<!-- form container -->
<div class="container">

      <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <h2 class="form-signin-heading">Database install</h2>
        <label for="inputServerName" class="sr-only">Server Name</label>
        <input type="text" id="inputText" class="form-control" name="hostname" placeholder="localhost" required autofocus>

         <label for="inputUserName" class="sr-only">Username</label>
        <input type="text" id="inputText" class="form-control" name="username" placeholder="root" required>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password"  placeholder="">

        <label for="inputDatabase" class="sr-only">Database Name</label>
		<input type="text" id="inputText" class="form-control" name="databasename" placeholder="myCMSalpha" required>
<button class="btn btn-lg btn-primary btn-block" name="Submit" type="submit">Sign in</button>

        <div><h3><?php form_output($hostname,$username,$password,$databasename); ?></h3></div>

        </div>
        
      </form>
	  

</div> 
<!-- /form container -->


<?php include '../template/foot.html';	?>