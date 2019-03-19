<?php 
	session_start();
	include '../connect.php';

	$stmt=$pdo->prepare("UPDATE classroom SET c_id = ? , c_name = ? , c_year = ? , c_term = ? , c_password = ? WHERE id = ?");
	$stmt->bindParam(1,$_POST['class_id']);
	$stmt->bindParam(2,$_POST['class_name']);
	$stmt->bindParam(3,$_POST['class_year']);
	$stmt->bindParam(4,$_POST['class_term']);
	$stmt->bindParam(5,$_POST['class_password']);
	$stmt->bindParam(6,$_POST['id']);

?>
<body>
	<?php 

		if ($_POST['class_id'] == ""  || $_POST['class_name'] == ""  || $_POST['class_year'] == ""  || $_POST['class_term'] == ""  || $_POST['class_password'] == "" ) {

			setcookie('edit_error',1,time()+5,'/'); ?>
			<script type='text/javascript'> window.location.href = 'admin_home.php';</script>

		<?php } else {

			if ($stmt->execute()) { 
			setcookie('edit_success',1,time()+5,'/'); ?>
			<script type='text/javascript'> window.location.href = 'admin_home.php';</script>

		<?php } else{
			
			setcookie('edit_error',1,time()+5,'/'); ?>
			<script type='text/javascript'> window.location.href = 'admin_home.php';</script>
		<?php } 
		} 		?>
</body>