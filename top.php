<?php
 /**
  * @author Joseph Collen Turner <admin@myCMSalpha.com>
  */
 session_start();
	include 'assets/variables.php';
 	include $LOCAL_THEMPLATE_DIR.'head.html';	
 	include $LOCAL_THEMPLATE_DIR.'navbar.html';
	
	if (file_exists('assets/config.php')):
		require 'assets/config.php';	
	else:
		exit(header("location:install.php"));
	endif;
	


 	if(!isset($_SESSION['UserData']['Username'])):  
		if(isset($_POST['Submit'])): 		
			$logins = array('admin' => 'admin','Tearran' => 'Turner13'); 
		if (isset($_POST['Username'])):
			$Username = $_POST['Username'] ;
		endif;		

		if (isset($_POST['Password'])):
			$Password = $_POST['Password'] ;
		endif; 
		if (isset($logins[$Username]) && $logins[$Username] == $Password):
			$_SESSION['UserData']['Username']=$logins[$Username];
			header("location:top.php");
			exit;		
		else :
			$msg="<span style='color:red'>Invalid Login Details</span>";
 		endif; 
 	endif; 

 	include $LOCAL_THEMPLATE_DIR.'form.html'; 
 		if(isset($msg)){echo $msg;exit;}
		 

 	endif; 

 include $LOCAL_THEMPLATE_DIR.'foot.html';	
?>