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
	$c_id = $_POST['c_id'];
	$c_sec = $_POST['c_sec'];

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

	

	
		if ($_SESSION['permission'] == 2) {
		if ($rowPass['c_password'] == $pass) {
			foreach ($_POST['Ch_INSERT'] as $Ch_INSERT) {
				if ($_POST['Ch_INSERT'] != "") {

					$stmt5=$pdo->prepare("SELECT * FROM enroll WHERE c_id = ? AND c_name = ? AND c_sec = ? AND c_year = ? AND c_term = ? AND s_id = ? AND s_name = ? AND s_department = ?");
					$stmt5->bindParam(1,$_POST['c_id']);
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
						$stmt3=$pdo->prepare("INSERT INTO enroll (c_id,c_name,c_year,c_term,c_sec,l_name,l_username,s_id,s_name,s_department) VALUES (?,?,?,?,?,?,?,?,?,?)");
											 $stmt3->bindParam(1,$_POST['c_id']);
											 $stmt3->bindParam(2,$rowCName['c_name']);
											 $stmt3->bindParam(3,$rowCYear['c_year']);
											 $stmt3->bindParam(4,$rowCTerm['c_term']);
											 $stmt3->bindParam(5,$rowCSec['c_sec']);
											 $stmt3->bindParam(6,$rowLName['l_name']);
											 $stmt3->bindParam(7,$rowLUSER['l_username']);
											 $stmt3->bindParam(8,$_POST['s_id'][$Ch_INSERT]);
											 $stmt3->bindParam(9,$_POST['s_name'][$Ch_INSERT]);
											 $stmt3->bindParam(10,$_POST['s_department'][$Ch_INSERT]);

											 $stmt3->execute();
										} 
									}	
									$rowCount=$stmt3->rowCount();
									if ($rowCount > 0) {
										setcookie('add_student_success',1,time()+5,'/');
										echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
									} else {
										setcookie('add_student_fail',1,time()+5,'/');
										echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
									}

					}

					
		} elseif ($rowPass['c_password'] != $pass) {
			setcookie('add_student_fail',1,time()+5,'/');
			echo "<script type='text/javascript'>window.location.href='detail_class.php?id=$id&c_id=$c_id&c_sec=$c_sec';</script>";
			}
		} 

	
?>
	