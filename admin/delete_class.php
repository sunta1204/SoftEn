<?php 
	session_start();
	include '../connect.php';

	$stmt=$pdo->prepare("DELETE FROM classroom WHERE id = ?");
	$stmt->bindParam(1,$_POST['id']);

?>
<body>
	<?php if ($stmt->execute()) {
		setcookie('delete_success',1,time()+5,'/'); ?>
		<script type="text/javascript"> window.location.href= 'admin_home.php'; </script>
	<?php } else {
		setcookie('delete_error',1,time()+5,'/'); ?>
		<script type="text/javascript"> window.location.href= 'admin_home.php'; </script>
	<?php } ?>
</body>