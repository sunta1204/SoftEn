<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
</head>
<body>
	<?php session_start(); ?>
	<?= $_SESSION["username"] ?><br>
	<?= $_SESSION["name"] ?>
</body>
</html>