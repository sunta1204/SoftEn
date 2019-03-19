<?php 
	session_start();
	include '../connect.php';

	$stmt=$pdo->prepare("UPDATE student SET s_name = ? , s_password = ? WHERE s_id = ? ");
	$stmt->bindParam(1,$_POST['name']);
	$stmt->bindParam(2,$_POST['password']);
	$stmt->bindParam(3,$_POST['username']);
	
?>
<body>
	<?php if ($stmt->execute()) { 
		setcookie('edit_profile_success',1,time()+5,'/'); ?>
		<script type="text/javascript"> window.location.href='student_home.php'; </script>
	<?php } else{
		setcookie('edit_profile_error',1,time()+5,'/'); ?>
		<script type="text/javascript"> window.location.href='student_home.php'; </script>
	<?php } ?>
</body>