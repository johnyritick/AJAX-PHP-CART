<?php
error_reporting(0);
session_start();
include_once('config.php');
include_once('functions.php');

?>
<!DOCTYPE html>
<html>


<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
	<!-- including header file -->
	<?php include('header.php') ?>
	<div id="main">
	
		<?php echo displayproduct($Products); ?>
	
		<div id="table">

		</div>
	</div>
	<!-- including footer file -->
	<?php include('footer.php'); ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script rel="text/javascript" src="script.js"></script>

</html>