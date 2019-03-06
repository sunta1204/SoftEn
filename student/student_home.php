<!DOCTYPE html>
<html>
<head>
	<title>Student Home</title>
</head>
<body>
	<?php session_start(); ?>
	<?= $_SESSION["username"] ?><br>
	<?= $_SESSION["name"] ?>
</body>
</html>