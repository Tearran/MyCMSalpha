<?php 
session_start();
?>
<div class="container">
<?php
if (!isset($_POST['next'])):
	echo '<form class="form-signin" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?next=1" method="post">';
	$next = 0;
else:

switch ($_GET['next']) :
    case 1:
        echo "This is case 1!";
		echo '<form class="form-signin" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?next=2" method="post">';
		$next = 2;
        break;
    case 2:
        echo "This is case 2!";
		echo '<form class="form-signin" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?next=3" method="post">';
		$next = 3;
        break;
    case 3:
        echo "This is case 3!";
		echo '<form class="form-signin" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?next=0" method="post">';
		$next = 0;
        break;
    default:
        echo "This is not case 1 2 or 3 !";
		echo '<form class="form-signin" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?next=1" method="post">';
		$next = 1;
endswitch;
endif;
?>
		<!-- form container -->



<button class="btn btn-lg btn-primary btn-block" name="next" type="submit" value='<?php echo $next; ?>'> <?php echo 'Case '.$next; ?></button>
</div>
</form>
</div> 
<!-- /form container -->