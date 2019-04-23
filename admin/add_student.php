<?php 
	session_start();
	include '../connect.php';

	$stmt=$pdo->prepare("SELECT c_id , c_name , c_password , c_sec , c_year , c_term FROM classroom WHERE id = ?");
	$stmt->bindParam(1,$_POST['id']);
	$stmt->execute();
	while ($row=$stmt->fetch()) {
		$rowCId['c_id'] = $row['c_id'];
		$rowCName['c_name'] = $row['c_name'];
		$rowPass['c_password'] = $row['c_password'];
		$rowCSec['c_sec'] = $row['c_sec'];
		$rowCYear['c_year'] = $row['c_year'];
		$rowCTerm['c_term'] = $row['c_term'];
 	}

	$pass = $_POST['c_password'];
	$user = $_SESSION['username'];
	$id = $_POST['id'];
	$c_id = $rowCId['c_id'];
	$c_sec = $rowCSec['c_sec'];

	$stmt2=$pdo->prepare("SELECT * FROM teacher WHERE l_username = ?");
	$stmt2->bindParam(1,$_SESSION['username']);
	$stmt2->execute();
	while ($row2=$stmt2->fetch()) {
		$rowLName['l_name'] = $row2['l_name'];
		$rowLUSER['l_username'] = $row2['l_username'];
	}

	$stmt4=$pdo->prepare("SELECT * FROM ta WHERE t_username = ?");
	$stmt4->bindParam(1,$_SESSION['username']);
	$stmt4->execute();
	while ($row4=$stmt4->fetch()) {
		$rowTName1['t_name'] = $row4['t_name'];
		$rowTUSER1['t_username'] = $row4['t_username'];
	}

			if ($_SESSION['permission'] == 1) {
				if ($rowPass['c_password'] == $pass) {
					if ($_POST['Ch_INSERT'] != "") {
						foreach ($_POST['Ch_INSERT'] as $Ch_INSERT) {
						

						$stmt6=$pdo->prepare("SELECT * FROM enroll WHERE c_id = ? AND c_name = ? AND c_sec = ? AND c_year = ? AND c_term = ? AND s_id = ? AND s_name = ? AND s_department = ?");
						$stmt6->bindParam(1,$c_id);
						$stmt6->bindParam(2,$rowCName['c_name']);
						$stmt6->bindParam(3,$rowCSec['c_sec']);
						$stmt6->bindParam(4,$rowCYear['c_year']);
						$stmt6->bindParam(5,$rowCTerm['c_term']);
						$stmt6->bindParam(6,$_POST['s_id'][$Ch_INSERT]);
						$stmt6->bindParam(7,$_POST['s_name'][$Ch_INSERT]);
						$stmt6->bindParam(8,$_POST['s_department'][$Ch_INSERT]);
						$stmt6->execute();
						$rowCount2=$stmt6->rowCount();

						if ($rowCount2 > 0) {
							setcookie('add_student_same',1,time()+5,'/');
							echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
						} else {

								$stmt9=$pdo->prepare("SELECT * FROM enroll WHERE s_id = ?");
								$stmt9->bindParam(1,$_POST['s_id'][$Ch_INSERT]);
								$stmt9->execute();
								while ($row9=$stmt9->fetch()) {
									$status1['status'] = $row9['status'];
								}

								if ($status1['status'] == 3) {
									setcookie('add_student_out',1,time()+5,'/');
									echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
								} else {
									$stmt7=$pdo->prepare("INSERT INTO enroll (c_id,c_name,c_sec,c_year,c_term,l_username,l_name,s_id,s_name,s_department) VALUES (?,?,?,?,?,?,?,?,?,?)");
									$stmt7->bindParam(1,$rowCId['c_id']);
									$stmt7->bindParam(2,$rowCName['c_name']);
									$stmt7->bindParam(3,$rowCSec['c_sec']);
									$stmt7->bindParam(4,$rowCYear['c_year']);
									$stmt7->bindParam(5,$rowCTerm['c_term']);
									$stmt7->bindParam(6,$rowLUSER['l_username']);
									$stmt7->bindParam(7,$rowLName['l_name']);
									$stmt7->bindParam(8,$_POST['s_id'][$Ch_INSERT]);
									$stmt7->bindParam(9,$_POST['s_name'][$Ch_INSERT]);
									$stmt7->bindParam(10,$_POST['s_department'][$Ch_INSERT]);
									$stmt7->execute();
								}
							}
							$rowCount4=$stmt7->rowcount();
							if ($rowCount4 > 0) {
							 	setcookie('add_student_success',1,time()+5,'/');
								echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
							 } else {
							 	setcookie('add_student_fail',1,time()+5,'/');
								echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
							 }
						}
					}  else {
							setcookie('add_student_null',1,time()+5,'/');
							echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
						}	
									
				} elseif ($rowPass['c_password'] != $pass) {
					setcookie('add_student_fail',1,time()+5,'/');
					echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
					} 

			} elseif ($_SESSION['permission'] == 2) {
				if ($rowPass['c_password'] == $pass) {
					if ($_POST['Ch_INSERT'] != "") {
						foreach ($_POST['Ch_INSERT'] as $Ch_INSERT) {
						

						$stmt5=$pdo->prepare("SELECT * FROM enroll WHERE c_id = ? AND c_name = ? AND c_sec = ? AND c_year = ? AND c_term = ? AND s_id = ? AND s_name = ? AND s_department = ?");
						$stmt5->bindParam(1,$c_id);
						$stmt5->bindParam(2,$rowCName['c_name']);
						$stmt5->bindParam(3,$rowCSec['c_sec']);
						$stmt5->bindParam(4,$rowCYear['c_year']);
						$stmt5->bindParam(5,$rowCTerm['c_term']);
						$stmt5->bindParam(6,$_POST['s_id'][$Ch_INSERT]);
						$stmt5->bindParam(7,$_POST['s_name'][$Ch_INSERT]);
						$stmt5->bindParam(8,$_POST['s_department'][$Ch_INSERT]);
						$stmt5->execute();
						$rowCount2=$stmt5->rowCount();

						if ($rowCount2 > 0) {
							setcookie('add_student_same',1,time()+5,'/');
							echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
						} else {

								$stmt8=$pdo->prepare("SELECT * FROM enroll WHERE s_id = ?");
								$stmt8->bindParam(1,$_POST['s_id'][$Ch_INSERT]);
								$stmt8->execute();
								while ($row8=$stmt8->fetch()) {
									$status2['status'] = $row8['status'];
								}

								if ($status2['status'] == 3) {
									setcookie('add_student_out',1,time()+5,'/');
									echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
								} else {
									$stmt3=$pdo->prepare("INSERT INTO enroll (c_id,c_name,c_sec,c_year,c_term,t_username,t_name,s_id,s_name,s_department) VALUES (?,?,?,?,?,?,?,?,?,?)");
									$stmt3->bindParam(1,$rowCId['c_id']);
									$stmt3->bindParam(2,$rowCName['c_name']);
									$stmt3->bindParam(3,$rowCSec['c_sec']);
									$stmt3->bindParam(4,$rowCYear['c_year']);
									$stmt3->bindParam(5,$rowCTerm['c_term']);
									$stmt3->bindParam(6,$rowTUSER1['t_username']);
									$stmt3->bindParam(7,$rowTName1['t_name']);
									$stmt3->bindParam(8,$_POST['s_id'][$Ch_INSERT]);
									$stmt3->bindParam(9,$_POST['s_name'][$Ch_INSERT]);
									$stmt3->bindParam(10,$_POST['s_department'][$Ch_INSERT]);
									$stmt3->execute();
								}
							}
							$rowCount=$stmt3->rowcount();
							if ($rowCount > 0) {
							 	setcookie('add_student_success',1,time()+5,'/');
								echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
							 } else {
							 	setcookie('add_student_fail',1,time()+5,'/');
								echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
							 }
						} 
						} else{
							setcookie('add_student_null',1,time()+5,'/');
							echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
					}	
									
				} elseif ($rowPass['c_password'] != $pass) {
					setcookie('add_student_fail',1,time()+5,'/');
					echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
					} 
			}
	
?>
	