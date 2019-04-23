<?php 
	session_start();
	include '../connect.php';

	$stmt3=$pdo->prepare("SELECT l_name FROM teacher WHERE l_username = ? ");
	$stmt3->bindParam(1,$_POST['l_username']);
	$stmt3->execute();
	while ($row3=$stmt3->fetch()) {
		$rowLname['l_name'] = $row3['l_name'];
	}

	$stmt2=$pdo->prepare("SELECT * FROM classroom WHERE c_id = ? AND c_name = ? AND c_sec = ? AND c_year = ? AND c_term = ?");
	$stmt2->bindParam(1,$_POST['c_id']);
	$stmt2->bindParam(2,$_POST['c_name']);
	$stmt2->bindParam(3,$_POST['c_sec']);
	$stmt2->bindParam(4,$_POST['c_year']);
	$stmt2->bindParam(5,$_POST['c_term']);
	$stmt2->execute();
	$rowCount=$stmt2->rowCount();

	if ($rowCount > 0) {
		setcookie('create_class_same',1,time()+5,'/'); 
		echo "<script type='text/javascript'> window.location.href = 'admin_home.php';</script>";
	} else {

		if ($_SESSION['permission'] ==2) {

			$stmt=$pdo->prepare("INSERT INTO classroom (c_id , c_name , c_year , c_term , c_password , l_username , t_username,c_sec , l_name) VALUES (?,?,?,?,?,?,?,?,?)");
			$stmt->bindParam(1,$_POST['c_id']);
			$stmt->bindParam(2,$_POST['c_name']);
			$stmt->bindParam(3,$_POST['c_year']);
			$stmt->bindParam(4,$_POST['c_term']);
			$stmt->bindParam(5,$_POST['c_password']);
			$stmt->bindParam(6,$_POST['l_username']);
			$stmt->bindParam(7,$_SESSION['username']);
			$stmt->bindParam(8,$_POST['c_sec']);
			$stmt->bindParam(9,$rowLname['l_name']);
			
			$stmt->execute();
			$rowCount=$stmt->rowCount();

			if ($rowCount > 0) {
				setcookie('create_success',1,time()+5,'/');
				echo "<script type='text/javascript'> window.location.href = 'admin_home.php';</script>";
			}else{
				setcookie("create_error",1,time()+5,'/');
				echo "<script type='text/javascript'> window.location.href = 'admin_home.php';</script>";
				}
			} 

		elseif ($_SESSION['permission'] == 1) {

				$stmt4=$pdo->prepare("INSERT INTO classroom (c_id , c_name , c_year , c_term , c_password , l_username ,c_sec , l_name) VALUES (?,?,?,?,?,?,?,?)");
				$stmt4->bindParam(1,$_POST['c_id']);
				$stmt4->bindParam(2,$_POST['c_name']);
				$stmt4->bindParam(3,$_POST['c_year']);
				$stmt4->bindParam(4,$_POST['c_term']);
				$stmt4->bindParam(5,$_POST['c_password']);
				$stmt4->bindParam(6,$_SESSION['username']);
				$stmt4->bindParam(7,$_POST['c_sec']);
				$stmt4->bindParam(8,$rowLname['l_name']);
				
				$stmt4->execute();
				$rowCount4=$stmt4->rowCount();

				if ($rowCount4 > 0) {
					setcookie('create_success',1,time()+5,'/');
					echo "<script type='text/javascript'> window.location.href = 'admin_home.php';</script>";
				}else{
					setcookie("create_error",1,time()+5,'/');
					echo "<script type='text/javascript'> window.location.href = 'admin_home.php';</script>";
					}
				}

		}			
?>