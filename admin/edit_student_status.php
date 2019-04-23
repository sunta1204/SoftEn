<?php 
	session_start();
	include '../connect.php';

	$id = $_POST['id'];
	$c_id = $_POST['c_id'];
	$c_sec = $_POST['c_sec'];	

	if ($_SESSION['permission'] == 1) {
		if ($_POST['status'] == 3 || $_POST['status'] == 1) {
			$stmt=$pdo->prepare("UPDATE enroll SET status = ? WHERE s_id = ? AND s_name = ? AND s_department = ?");
		
			$stmt->bindParam(1,$_POST['status']);
			$stmt->bindParam(2,$_POST['s_id']);
			$stmt->bindParam(3,$_POST['s_name']);
			$stmt->bindParam(4,$_POST['s_department']);	
			$stmt->execute();
			$rowCount = $stmt->rowCount();

			if ($rowCount > 0) {
				setcookie('edit_student_success',1,time()+5,'/');
				echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
			 } else {
			 	setcookie('edit_student_error',1,time()+5,'/');
				echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
			 }
		} else {
			$stmt2=$pdo->prepare("UPDATE enroll SET status = ? WHERE s_id = ? AND s_name = ? AND s_department = ?  AND c_id = ? ");
		
			$stmt2->bindParam(1,$_POST['status']);
			$stmt2->bindParam(2,$_POST['s_id']);
			$stmt2->bindParam(3,$_POST['s_name']);
			$stmt2->bindParam(4,$_POST['s_department']);	
			$stmt2->bindParam(5,$_POST['c_id']);
			$stmt2->execute();
			$rowCount2 = $stmt2->rowCount();

			if ($rowCount2 > 0) {
				setcookie('edit_student_success',1,time()+5,'/');
				echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
			 } else {
			 	setcookie('edit_student_error',1,time()+5,'/');
				echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
			 }
		}
		
	} elseif ($_SESSION['permission'] == 2) {
		if ($_POST['status'] == 3 || $_POST['status'] == 1) {
			$stmt=$pdo->prepare("UPDATE enroll SET status = ? WHERE s_id = ? AND s_name = ? AND s_department = ?");
		
			$stmt->bindParam(1,$_POST['status']);
			$stmt->bindParam(2,$_POST['s_id']);
			$stmt->bindParam(3,$_POST['s_name']);
			$stmt->bindParam(4,$_POST['s_department']);	
			$stmt->execute();
			$rowCount = $stmt->rowCount();

			if ($rowCount > 0) {
				setcookie('edit_student_success',1,time()+5,'/');
				echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
			 } else {
			 	setcookie('edit_student_error',1,time()+5,'/');
				echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
			 }
		} else {
			$stmt2=$pdo->prepare("UPDATE enroll SET status = ? WHERE s_id = ? AND s_name = ? AND s_department = ?  AND c_id = ? ");
		
			$stmt2->bindParam(1,$_POST['status']);
			$stmt2->bindParam(2,$_POST['s_id']);
			$stmt2->bindParam(3,$_POST['s_name']);
			$stmt2->bindParam(4,$_POST['s_department']);	
			$stmt2->bindParam(5,$_POST['c_id']);
			$stmt2->execute();
			$rowCount2 = $stmt2->rowCount();

			if ($rowCount2 > 0) {
				setcookie('edit_student_success',1,time()+5,'/');
				echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
			 } else {
			 	setcookie('edit_student_error',1,time()+5,'/');
				echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
			 }
		}
	}		
?>