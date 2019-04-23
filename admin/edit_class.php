<?php 
	session_start();
	include '../connect.php';

	if ($_SESSION['permission'] == 2) {
		$stmt2=$pdo->prepare("SELECT l_name FROM teacher WHERE l_username = ?");
		$stmt2->bindParam(1,$_POST['l_username']);
		$stmt2->execute();
		while ($row2=$stmt2->fetch()) {
			$LName['l_name'] = $row2['l_name'];
		}

		$stmt=$pdo->prepare("UPDATE classroom SET c_id = ? , c_name = ? , c_year = ? , c_term = ? , c_password = ? , c_sec = ? , l_username = ? , l_name = ? WHERE id = ?");
		$stmt->bindParam(1,$_POST['class_id']);
		$stmt->bindParam(2,$_POST['class_name']);
		$stmt->bindParam(3,$_POST['class_year']);
		$stmt->bindParam(4,$_POST['class_term']);
		$stmt->bindParam(5,$_POST['class_password']);
		$stmt->bindParam(6,$_POST['class_sec']);
		$stmt->bindParam(7,$_POST['l_username']);
		$stmt->bindParam(8,$LName['l_name']);
		$stmt->bindParam(9,$_POST['id']);
		$stmt->execute();
		$rowCount = $stmt->rowCount();

	?>
	<body>
		<?php 

			if ($_POST['class_id'] == ""  || $_POST['class_name'] == ""  || $_POST['class_year'] == ""  || $_POST['class_term'] == ""  || $_POST['class_password'] == "" ) {

				setcookie('edit_error',1,time()+5,'/'); ?>
				<script type='text/javascript'> window.location.href = 'admin_home.php';</script>

			<?php } else {

				if ($rowCount > 0) { 
				setcookie('edit_success',1,time()+5,'/'); ?>
				<script type='text/javascript'> window.location.href = 'admin_home.php';</script>

			<?php } else{
				
				setcookie('edit_error',1,time()+5,'/'); ?>
				<script type='text/javascript'> window.location.href = 'admin_home.php';</script>
			<?php } 
			} 		?>
	</body>
	<?php } elseif ($_SESSION['permission'] == 1) {

				$stmt3=$pdo->prepare("UPDATE classroom SET c_id = ? , c_name = ? , c_year = ? , c_term = ? , c_password = ? , c_sec = ?  WHERE id = ?");
				$stmt3->bindParam(1,$_POST['class_id']);
				$stmt3->bindParam(2,$_POST['class_name']);
				$stmt3->bindParam(3,$_POST['class_year']);
				$stmt3->bindParam(4,$_POST['class_term']);
				$stmt3->bindParam(5,$_POST['class_password']);
				$stmt3->bindParam(6,$_POST['class_sec']);
				$stmt3->bindParam(7,$_POST['id']);
				$stmt3->execute();
				$rowCount3 = $stmt3->rowCount();

				if ($rowCount3 > 0) {
					setcookie('edit_success',1,time()+5,'/'); 
					echo "<script type='text/javascript'> window.location.href = 'admin_home.php';</script>";
				} else {
					setcookie('edit_error',1,time()+5,'/'); 
					echo "<script type='text/javascript'> window.location.href = 'admin_home.php';</script>";
				}
	}

	