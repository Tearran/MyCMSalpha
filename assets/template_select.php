<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/MyCMSalpha/MyCMSalpha/";
   
function set_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>


<!-- form container -->
<div class="container col-md-4 col-md-offset-4">
	<div class="panel panel-primary">
		<div class="panel-heading "><h3 class="form-signin-heading">Template Select</h3></div>
		<div class="panel-body">
			<div class="row">
				<div class="form-group col-md-12">
					<form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="post">
						<?php $a =0;?>
						<?php foreach(glob($path.'template/*', GLOB_ONLYDIR) as $theme): $a++;?>
						<?php 	echo '<label for="inputUserName" class="sr-only"></label><input type="radio" name="theme" value="'.set_input($theme).'">'.$theme.'<br>'; ?>
						<?php endforeach; ?>
						<label for="Submit" class="sr-only">Submit</label>
						<br><button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
						<?php if(isset($_POST['theme'])){echo "<label for=\"inputerror\"></label><div class=\"alert alert-info\" role=\"alert\">".$theme."</div>";}?>						
					</form>
				</div>
			</div>
			<!-- end row -->
			<div class="row">
			  <div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="<?php echo $theme.'screen.svg'; ?>" data-holder-rendered="true" alt="...">
					<div class="caption">
						<h3>Thumbnail label</h3>
						<p>...</p>
						<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
					</div>
				</div>
			  </div>
			</div>

		</div>
	</div> 
</div> 
<!-- /form container -->



