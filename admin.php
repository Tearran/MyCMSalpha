<?php 	session_start(); 	?>
<?php 	require 'assets/config.php';	?>
<?php 	include 'template/head.html';	?>
<?php 	include 'template/navbar.html';?>

<?php 	if(!isset($_SESSION['UserData']['Username'])):  ?>
<?php		if(isset($_POST['Submit'])): ?>		
<?php			$logins = array('admin' => 'admin','user' => 'user','username2' => 'password2'); ?>
<?php		if (isset($_POST['Username'])):?>
<?php			$Username = $_POST['Username'] ;?>
<?php		endif;		?>

<?php		if (isset($_POST['Password'])):?>
<?php			$Password = $_POST['Password'] ;?>
<?php		endif; ?>
<?php		if (isset($logins[$Username]) && $logins[$Username] == $Password):?>
<?php			$_SESSION['UserData']['Username']=$logins[$Username];?>
<?php			header("location:index.php");?>
<?php			exit;?>		
<?php		else :?>
<?php			$msg="<span style='color:red'>Invalid Login Details</span>";?>
<?php 		endif; ?>
<?php 	endif; ?>

<?php 	include 'template/form.html'; ?>
<?php 		if(isset($msg)):?>
<?php 			echo $msg;?></td>
<?php 		endif; ?>
<?php		exit; ?>

<?php 	endif; ?>

<?php include 'template/foot.html';	?>
