<?php 
	session_start();
	include '../connect.php';

	$id = $_POST['id'];
	$c_id = $_POST['c_id'];
	$c_sec = $_POST['c_sec'];

	$stmt4=$pdo->prepare("SELECT * FROM classroom WHERE id = ?");
	$stmt4->bindParam(1,$_POST['id']);
	$stmt4->execute();
	while ($row4=$stmt4->fetch()) {
		$CID['c_id'] = $row4['c_id'];
		$CNAME['c_name'] = $row4['c_name'];
		$CSEC['c_sec'] = $row4['c_sec'];
		$CYEAR['c_year'] = $row4['c_year'];
		$CTERM['c_term'] = $row4['c_term'];
	}

	$stmt5=$pdo->prepare("SELECT * FROM ta WHERE t_username = ?");
	$stmt5->bindParam(1,$_SESSION['username']);
	$stmt5->execute();
	while ($row5=$stmt5->fetch()) {
		$TNAME['t_name'] = $row5['t_name'];
		$TUSERNMAE['t_username'] = $row5['t_username'];
	}

	$stmt7=$pdo->prepare("SELECT * FROM teacher WHERE l_username = ?");
	$stmt7->bindParam(1,$_SESSION['username']);
	$stmt7->execute();
	while ($row7=$stmt7->fetch()) {
		$LNAME['l_name'] = $row7['l_name'];
		$LUSERNMAE['l_username'] = $row7['l_username'];
	}


	$stmt6=$pdo->prepare("SELECT * FROM student WHERE s_id = ?");
	$stmt6->bindParam(1,$_POST['s_id']);
	$stmt6->execute();
	while ($row6=$stmt6->fetch()) {
		$SID['s_id'] = $row6['s_id'];
		$SNAME['s_name'] = $row6['s_name'];
		$SDEPARTMENT['s_department'] = $row6['s_department'];
	}

	if ($_SESSION['permission'] == 1) {
		if ($_POST['status'] == 2 || $_POST['status'] == 3){
			setcookie('edit_studen_sec_status_error',1,time()+5,'/');
			echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
		} else {
				$stmt8=$pdo->prepare("SELECT * FROM enroll WHERE s_id = ? AND c_id = ? AND c_sec = ? AND c_term = ? AND c_year = ?");
				$stmt8->bindParam(1,$_POST['s_id']);
				$stmt8->bindParam(2,$_POST['c_id']);
				$stmt8->bindParam(3,$_POST['class_section']);
				$stmt8->bindParam(4,$_POST['c_term']);
				$stmt8->bindParam(5,$_POST['c_year']);

				$stmt8->execute();
				$rowCount8 = $stmt8->rowCount();

				if ($rowCount8 > 0) {
					setcookie('edit_student_error',1,time()+5,'/');
					echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
				}else {
					$status1 = 4;
					$stmt9=$pdo->prepare("UPDATE enroll SET sec_transfer = ? , sec_from = ? , status = ? WHERE  enroll_id = ? ");
					
					$stmt9->bindParam(1,$_POST['class_section']);
					$stmt9->bindParam(2,$_POST['c_sec']);
					$stmt9->bindParam(3,$status1);
					$stmt9->bindParam(4,$_POST['enroll_id']);
					$stmt9->execute();
					$rowCount9 = $stmt9->rowCount();

					if ($rowCount9 > 0) {
						$stmt10=$pdo->prepare("INSERT INTO enroll (c_id,c_name,c_sec,c_year,c_term,l_username,l_name,s_id,s_name,s_department,sec_from,sec_transfer) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
						$stmt10->bindParam(1,$CID['c_id']);
						$stmt10->bindParam(2,$CNAME['c_name']);
						$stmt10->bindParam(3,$_POST['class_section']);
						$stmt10->bindParam(4,$CYEAR['c_year']);
						$stmt10->bindParam(5,$CTERM['c_term']);
						$stmt10->bindParam(6,$LUSERNMAE['l_username']);
						$stmt10->bindParam(7,$LNAME['l_name']);
						$stmt10->bindParam(8,$SID['s_id']);
						$stmt10->bindParam(9,$SNAME['s_name']);
						$stmt10->bindParam(10,$SDEPARTMENT['s_department']);
						$stmt10->bindParam(11,$c_sec);
						$stmt10->bindParam(12,$_POST['class_section']);
						$stmt10->execute();
						$rowCount10=$stmt10->rowcount();
						if ($rowCount10 > 0) {
							setcookie('edit_student_success',1,time()+5,'/');
							echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
						} else {
							setcookie('edit_student_error',1,time()+5,'/');
							echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
						}
					 } else {
					 	setcookie('edit_student_error',1,time()+5,'/');
						echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
					 }
				}
		}
	} elseif ($_SESSION['permission'] == 2) {
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
					$status = 4;
					$stmt=$pdo->prepare("UPDATE enroll SET sec_transfer = ? , sec_from = ? , status = ? WHERE  enroll_id = ? ");
					
					$stmt->bindParam(1,$_POST['class_section']);
					$stmt->bindParam(2,$_POST['c_sec']);
					$stmt->bindParam(3,$status);
					$stmt->bindParam(4,$_POST['enroll_id']);
					$stmt->execute();
					$rowCount = $stmt->rowCount();

					if ($rowCount > 0) {
						$stmt3=$pdo->prepare("INSERT INTO enroll (c_id,c_name,c_sec,c_year,c_term,t_username,t_name,s_id,s_name,s_department,sec_from,sec_transfer) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
						$stmt3->bindParam(1,$CID['c_id']);
						$stmt3->bindParam(2,$CNAME['c_name']);
						$stmt3->bindParam(3,$_POST['class_section']);
						$stmt3->bindParam(4,$CYEAR['c_year']);
						$stmt3->bindParam(5,$CTERM['c_term']);
						$stmt3->bindParam(6,$TUSERNMAE['t_username']);
						$stmt3->bindParam(7,$TNAME['t_name']);
						$stmt3->bindParam(8,$SID['s_id']);
						$stmt3->bindParam(9,$SNAME['s_name']);
						$stmt3->bindParam(10,$SDEPARTMENT['s_department']);
						$stmt3->bindParam(11,$c_sec);
						$stmt3->bindParam(12,$_POST['class_section']);
						$stmt3->execute();
						$rowCount3=$stmt3->rowcount();
						if ($rowCount3 > 0) {
							setcookie('edit_student_success',1,time()+5,'/');
							echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
						} else {
							setcookie('edit_student_error',1,time()+5,'/');
							echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
						}
					 } else {
					 	setcookie('edit_student_error',1,time()+5,'/');
						echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
					 }
				}
		}
	}

		

	
?>