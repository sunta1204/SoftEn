<?php 
	session_start();
	include "../connect.php";

	$id = $_POST['id'];
	$c_id = $_POST['c_id'];
	$c_sec = $_POST['c_sec'];

	$stmt=$pdo->prepare("SELECT * FROM enroll WHERE enroll_id = ?");
	$stmt->bindParam(1,$_POST['enroll_id']);
	$stmt->execute();
	while ($row=$stmt->fetch()) {
		$enroll_id['enroll_id'] = $row['enroll_id'];
		$s_id['s_id'] = $row['s_id'];
		$s_name['s_name'] = $row['s_name'];
		$s_department['s_department'] = $row['s_department'];
		$status['status'] = $row['status'];
		$class_sec['c_sec'] = $row['c_sec'];
	}

	$stmt2=$pdo->prepare("SELECT * FROM classroom WHERE c_id = ? AND c_year = ? AND c_term = ?");
	$stmt2->bindParam(1,$_POST['c_id']);
	$stmt2->bindParam(2,$_POST['c_year']);
	$stmt2->bindParam(3,$_POST['c_term']);
	$stmt2->execute();

	$c_term = $_POST['c_term'];
	$c_year = $_POST['c_year'];

	$stmt3 = $pdo->prepare("SELECT * FROM ta WHERE t_username = ?");
	$stmt3->bindParam(1,$_SESSION["username"]);
	$stmt3->execute();
	while ($row3=$stmt3->fetch()) {
	 	$rowUser1["t_username"] = $row3["t_username"];
	 	$rowPassword1["t_password"] = $row3["t_password"];
	 	$rowName1["t_name"] = $row3["t_name"];
	 } 

	

	if (!empty($_SESSION['username']) && $_SESSION['permission'] == 1 || $_SESSION['permission'] == 2) { ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Student Form</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

	<?php if ($_SESSION['permission'] == 2) { ?>
		<!-- Navbar --> 
		<nav class="navbar sticky-top navbar-light navbar-expand-lg" style="background-color: #747d8c;">
	 		<a class="navbar-brand text-light" href="admin_home.php">CheckClassroom</a>
	  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
	    	</button>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
			    <ul class="navbar-nav mr-auto">
			
			    </ul>
			    <div class="form-inline my-2 my-lg-0 mr-sm-2  col-3">
			    	<a href="" class="btn btn-primary  dropdown-toggle col-12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-user-tie"></i> <?= $rowName1["t_name"] ?> </a>
			    	<div class="dropdown-menu col-10">
			    		<button class="dropdown-item" data-target="#profile1" data-toggle="modal"> ข้อมูลส่วนตัว </button>
			    		<button class="dropdown-item" data-target="#editProfile1" data-toggle="modal"> แก้ไขข้อมูลส่วนตัว </button>
			    		<div class="dropdown-divider"></div>
			    		<a href="../admin/admin_logout.php" class="dropdown-item" id="logout_button"> ออกจากระบบ </a>
			    	</div>
			    </div>
			  </div>
		</nav>

		<!-- Modal Profile -->
		<div class="modal fade" id="profile1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content " style="box-shadow: 0px 0px 50px 25px #1e272e;">
			      <div class="modal-header">
			        <h3 class="modal-title" id="exampleModalLabel">Profile</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      	<div class="modal-body" style="padding: 20px;">
				       <div class="form-group">
				       		<label class="text-primary" style="font-size: 20px;"> ชื่อผู้ใช้ </label>
				       		<input type="text" name="username" class="form-control" value="<?=$rowUser1['t_username']?>" readonly>
				       </div>
				       <div class="form-group">
				       		<label class="text-primary" style="font-size: 20px;"> ชื่อ - นามสกุล </label>
				       		<input type="text" name="username" class="form-control" value="<?=$rowName1['t_name']?>" readonly>
				       </div>	
				       <div class="form-group">
				       		<label class="text-primary" style="font-size: 20px;"> ตำแหน่ง </label>
				       		<input type="text" name="permission" class="form-control" value="ผู้ช่วยสอน" readonly>
				       </div>		
			      	</div>		      
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>

		<!-- Modal EDIT Profile -->
		<form action="edit_profile.php" method="post" name="edit_profile" onSubmit="JavaScript:return editSubmit();">
		<div class="modal fade" id="editProfile1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content " style="box-shadow: 0px 0px 50px 25px #1e272e;">
			      <div class="modal-header">
			        <h3 class="modal-title" id="exampleModalLabel">Profile</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      	<div class="modal-body" style=" padding: 50px;">
				       <div class="form-group">
				       		<label class="text-primary" style="font-size: 20px;"> ชื่อผู้ใช้ </label>
				       		<input type="text" name="username" class="form-control" value="<?=$rowUser1['t_username']?>" readonly>
				       </div>
				       <div class="form-group">
				       		<label class="text-primary" style="font-size: 20px;"> ชื่อ - นามสกุล </label>
				       		<input type="text" name="name" class="form-control" value="<?=$rowName1['t_name']?>">
				       </div>	
				        <div class="form-group">
				       		<label class="text-primary" style="font-size: 20px;"> รหัสผ่าน </label>
				       		<input type="text" name="password" class="form-control" value="<?=$rowPassword1['t_password']?>">
				       </div>
			      </div>		      
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" id="edit_submit"> Submit </button>
			      </div>
			    </div>
			  </div>
			</div>
		</form>
	<?php } ?>

	<div class="container" style="padding-left: 50px;padding-right: 50px;padding-top: 50px; padding-bottom: 285px;background-color: #ecf0f1;">
		<form action="edit_student.php" method="post">
			<input type="hidden" name="id" value="<?=$id?>">
			<input type="hidden" name="c_id" value="<?=$c_id?>">
			<input type="hidden" name="c_sec" value="<?=$c_sec?>">
			<input type="hidden" name="c_year" value="<?=$c_year?>">
			<input type="hidden" name="c_term" value="<?=$c_term?>">
			<input type="hidden" name="s_id" value="<?=$s_id['s_id']?>">
			<input type="hidden" name="s_name" value="<?=$s_name['s_name']?>">
			<input type="hidden" name="s_department" value="<?=$s_department['s_department']?>">
			<input type="hidden" name="enroll_id" value="<?=$enroll_id['enroll_id']?>">
			<label class="text-primary" style="font-size: 36px;"> แก้ไขข้อมูลนักศึกษา </label>
			<div class="form-group">
				<label class="text-primary" style="font-size: 20px;"> รหัสนักศึกษา </label>
				<input class="form-control" readonly="" type="text" name="s_id" id="s_id" value="<?=$s_id['s_id']?>">
			</div>
			<div class="form-group">
				<label class="text-primary" style="font-size: 20px;"> ชื่อ-นามสกุล </label>
				<input class="form-control" readonly="" type="text" name="s_name" id="s_name" value="<?=$s_name['s_name']?>">
			</div>
			<div class="form-group">
				<label class="text-primary" style="font-size: 20px;"> สาขาวิชา </label>
				<input class="form-control" readonly="" type="text" name="s_department" id="s_department" value="<?=$s_department['s_department']?>">
			</div>
			<div class="form-group">
				<label class="text-primary" style="font-size: 20px;"> Section </label>
				<select name="class_section" id="class_section" class="form-control">
					<option value="<?=$class_sec['c_sec']?>"> <?=$class_sec['c_sec']?> </option>
					<?php while ($row2 = $stmt2->fetch()) { ?>
						<option value="<?=$row2['c_sec']?>"> <?=$row2['c_sec']?> </option>
					<?php } ?>
				</select>
			</div><br><br>
			<div class="form-inline">
				<a href="detail_class.php?id=<?=$id?>&c_id=<?=$c_id?>&c_sec=<?=$c_sec?>" class="btn btn-danger col-3 mr-sm-2 mb-4" id="back_to_detail"  > ย้อนกลับ </a>
				<button type="submit" name="submit_edit_button" id="submit_edit_button" class="btn btn-primary col-3 mr-sm-2 mb-4"> แก้ไข </button>
			</div>
		</form>
	</div>

	<footer style="background-color: #747d8c; padding: 24px;">
		<div style="text-align: center;">
			<label style="font-size: 18px; color: white; padding: 9px;">@Copyright By 5 สหายคล้ายจะเป็นลม</label>
		</div>		
	</footer>
		
</body>
</html>


	<?php } else {
		setcookie('wrong_login',1,time()+10,'/');
		echo "<script type='text/javascript'> window.location.href = '../index.php';</script>";
	}

?>