<?php 
	session_start();
	include '../connect.php';

	$id = $_POST['id'];
	$c_id = $_POST['c_id'];
	$c_sec = $_POST['c_sec'];

	$stmt=$pdo->prepare("DELETE FROM enroll WHERE enroll_id = ?");
	$stmt->bindParam(1,$_POST['enroll_id']);

?>
<body>
	<?php if ($stmt->execute()) {
		setcookie('delete_student_success',1,time()+5,'/');
		echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
	} else {
		setcookie('delete_student_fail',1,time()+5,'/');
		echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
	} ?>
</body>