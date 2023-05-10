<?php
  $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "header.php";
   include_once("header.php");
   include_once("navbar.php");
?>
<html>
<head>
<style>
body {
	background-color: white;
}
</body>
</style>
</head>
<body>

<br><div class="container">
	
  <div class="row" align="center">
    <div class="col-lg-6" style="margin-left: 260px; margin-bottom: 30px; color: inherit; background-color: #eee ">
		<div  class="jumbotron">
		<form class="form-horizontal" method= "post" action = "add.cor.php">
			<fieldset>

			<!-- Form Name -->
			<legend>Add Details</legend>

			
			<!-- Text input-->
			    <div class="form-group">
				  <label class="col-md-4 control-label" for="corcode">Team Name</label>  
				  <div class="col-md-5">
				  <input id="corcode" name="team_name" type="text" placeholder="" class="form-control input-md" required="">	
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-md-4 control-label" for="corcode">Employee Code</label>  
				  <div class="col-md-5">
				  <input id="corcode" name="emp_code" type="text" placeholder="" class="form-control input-md" required="">	
				  </div>
				</div>
				
			
			<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="corname">Employee Name</label>  
				  <div class="col-md-5">
				  <input id="corname" name="emp_name" type="text" placeholder="" class="form-control input-md" required="">
				  </div>
				</div>
				
				<!-- Button -->
			<div class="form-group"  align="right" >
			  <label class="col-md-4 control-label" for="submit"></label>
			  <div class="col-md-5">
				<button id="submit" name="submit" class="btn btn-success">Add Details</button>
			  </div>
			</div>

			</fieldset>
			</form>
		</div>		
    </div>

<?php
  $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "footer.php";
   include_once("footer.php");
   include_once("navbar.php");
?>