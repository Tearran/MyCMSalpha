<?php 
session_start();

if (!isset($_GET['next'])):
$next = 0;
else:

switch ($_GET['next']) :
    case 1:
        echo "Your favorite color is red!";
		$next = 2;
        break;
    case 2:
        echo "Your favorite color is blue!";
		$next = 3;
        break;
    case 3:
        echo "Your favorite color is green!";
		$next = 0;
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
		$next = 1;
endswitch;
endif;
?>
		<!-- form container -->
<div class="container">

<form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">

<button class="btn btn-lg btn-primary btn-block" name="next" type="submit" value='<?php echo $next; ?>'>Next</button>


</div>

</form>
</div> 
<!-- /form container -->