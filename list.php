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
	
	style="margin-left: 260px; 
	margin-bottom: 30px;
	color: inherit; 
	background-color: #eee
}
</body>
</style>
</head>
<body>
            <div align="center">
            <legend>List of Team Name</legend></fieldset>
			<?php
				include_once("faclist.php");
			?>
			<br>
			<br>
			<br>
					

<?php
   include_once("footer.php");
   include_once("navbar.php");
?>