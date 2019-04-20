<?php 
	session_start();
	include '../connect.php';

	$id = $_POST['id'];
	$c_id = $_POST['c_id'];
	$c_sec = $_POST['c_sec'];

	if ($_POST['status'] == 2 || $_POST['status'] == 3){
		setcookie('edit_studen_sec_status_error',1,time()+5,'/');
		echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
	} else {
		$stmt2=$pdo->prepare("SELECT * FROM enroll WHERE s_id = ? AND c_id = ? AND c_sec = ? AND c_term = ? AND c_year = ?");
		$stmt2->bindParam(1,$_POST['s_id']);
		$stmt2->bindParam(2,$_POST['c_id']);
		$stmt2->bindParam(3,$_POST['class_section']);
		$stmt2->bindParam(4,$_POST['c_term']);
		$stmt2->bindParam(5,$_POST['c_year']);

		$stmt2->execute();
		$rowCount2 = $stmt2->rowCount();

		if ($rowCount2 > 0) {
			setcookie('edit_student_error',1,time()+5,'/');
			echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
		}else {
			$stmt=$pdo->prepare("UPDATE enroll SET c_sec = ? WHERE  enroll_id = ? ");
			
			$stmt->bindParam(1,$_POST['class_section']);
			$stmt->bindParam(2,$_POST['enroll_id']);
			$stmt->execute();
			$rowCount = $stmt->rowCount();

			if ($rowCount > 0) {
				setcookie('edit_student_success',1,time()+5,'/');
				echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
			 } else {
			 	setcookie('edit_student_error',1,time()+5,'/');
				echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
			 }
		}
	}

	
?>