<?php 
	session_start();
	include '../connect.php';

	$stmt=$pdo->prepare("SELECT c_id , c_name , c_password , c_sec FROM classroom WHERE c_id = ?");
	$stmt->bindParam(1,$_POST['c_id']);
	$stmt->execute();
	while ($row=$stmt->fetch()) {
		$rowCId['c_id'] = $row['c_id'];
		$rowCName['c_name'] = $row['c_name'];
		$rowCSec['c_sec'] = $row['c_sec'];
		$rowPass['c_password'] = $row['c_password'];
	}

	$pass = $_POST['c_password'];
	$user = $_SESSION['username'];
	$id = $_POST['id'];

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
		$rowLName1['t_name'] = $row4['t_name'];
		$rowLUSER1['t_username'] = $row4['t_username'];
	}

 	for ($i=0; $i < count($_POST['Ch_INSERT']); $i++) { 
 		if ($_POST['Ch_INSERT'] != "") {

 			$stmt5=$pdo->prepare("INSERT INTO enroll (c_id , c_name , c_sec , l_username , l_name , s_id , s_name , s_department) VALUES (?,?,?,?,?,?,?,?)");
 			$stmt5->bindParam(1,$rowCId['c_id']);
 			$stmt5->bindParam(2,$rowCName['c_name']);
 			$stmt5->bindParam(3,$rowCSec['c_sec']);
 			$stmt5->bindParam(4,$rowLUSER['l_username']);
 			$stmt5->bindParam(5,$rowLName['l_name']);
 			$stmt5->bindParam(6,$_POST['s_id'][$i]);
 			$stmt5->bindParam(7,$_POST['s_name'][$i]);
 			$stmt5->bindParam(8,$_POST['s_department'][$i]);

 			$stmt5->execute();
 		}
 	}
		echo "<script type='text/javascript'> window.location.href = 'admin_home.php';</script>";
?>
	