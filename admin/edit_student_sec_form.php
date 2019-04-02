<?php 
	session_start();
	include '../connect.php';

	$id = $_POST['id'];
	$c_id = $_POST['c_id'];
	$c_sec = $_POST['c_sec'];

	
		$stmt=$pdo->prepare("UPDATE enroll SET status = ? WHERE s_id = ? AND s_name = ? AND s_department = ?  AND c_id = ? ");
		
		$stmt->bindParam(1,$_POST['status']);
		$stmt->bindParam(2,$_POST['s_id']);
		$stmt->bindParam(3,$_POST['s_name']);
		$stmt->bindParam(4,$_POST['s_department']);	
		$stmt->bindParam(5,$_POST['c_id']);
		$stmt->execute();
		$rowCount = $stmt->rowCount();

		if ($rowCount > 0) {
			setcookie('edit_student_success',1,time()+5,'/');
			echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
		 } else {
		 	setcookie('edit_student_error',1,time()+5,'/');
			echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
		 }
?>