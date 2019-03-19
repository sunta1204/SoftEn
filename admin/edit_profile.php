<?php 
	session_start();
	include '../connect.php';

	if ($_SESSION['permission'] == 1) {
		$stmt=$pdo->prepare("UPDATE teacher SET l_name = ? , l_password = ? WHERE l_username = ? ");
		$stmt->bindParam(1,$_POST['name']);
		$stmt->bindParam(2,$_POST['password']);
		$stmt->bindParam(3,$_POST['username']);

	} 
	elseif ($_SESSION['permission']==2) {
		$stmt=$pdo->prepare("UPDATE ta SET t_name = ? , t_password = ? WHERE t_username = ? ");
		$stmt->bindParam(1,$_POST['name']);
		$stmt->bindParam(2,$_POST['password']);
		$stmt->bindParam(3,$_POST['username']);
	}	
?>
<body>
	<?php if ($stmt->execute()) { 
		setcookie('edit_profile_success',1,time()+5,'/'); ?>
		<script type="text/javascript"> window.location.href='admin_home.php'; </script>
	<?php } else{
		setcookie('edit_profile_error',1,time()+5,'/'); ?>
		<script type="text/javascript"> window.location.href='admin_home.php'; </script>
	<?php } ?>
</body>