<?php 
	session_start();
	include "../connect.php";

	$id = $_POST['id'];
	$c_id = $_POST['c_id'];
	$c_sec = $_POST['c_sec'];

	if (isset($_FILES['student_file'])) {

		$filename = $_FILES['student_file']['tmp_name'];

		if ($_FILES['student_file']['size'] > 0) {

			$file  = fopen($filename, "r");
			while (($empData = fgetcsv($file,10000,",")) !== FALSE) {

				$stmt=$pdo->prepare("INSERT INTO enroll (c_id , c_name , c_sec , c_year , c_term , s_id , s_name , s_department) VALUES (?,?,?,?,?,?,?,?)");
				$stmt->bindParam(1,$_POST['c_id']);
				$stmt->bindParam(2,$_POST['c_name']);
				$stmt->bindParam(3,$_POST['c_sec']);
				$stmt->bindParam(4,$_POST['c_year']);
				$stmt->bindParam(5,$_POST['c_term']);
				$stmt->bindParam(6,$empData[0]);
				$stmt->bindParam(7,$empData[1]);
				$stmt->bindParam(8,$empData[2]);
				$stmt->execute();
				$rowCount=$stmt->rowCount();
			}

			fclose($file);
			if ($rowCount > 0) {

				setcookie('add_student_success',1,time()+5,'/');
				echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";

			}else{

				setcookie('add_student_fail',1,time()+5,'/');
				echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
			}
		}
	} else {

		setcookie('add_student_fail',1,time()+5,'/');
		echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
	}
?>