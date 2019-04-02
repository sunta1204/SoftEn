<?php 
	session_start();
	include '../connect.php';

	$stmt =$pdo->prepare("SELECT * FROM teacher WHERE l_username = ?");
	$stmt->bindParam(1,$_SESSION["username"]);
	$stmt->execute();
	while ($row=$stmt->fetch()) {
	 	$rowUser["l_username"] = $row["l_username"];
	 	$rowPassword["l_password"] = $row["l_password"];
	 	$rowName["l_name"] = $row["l_name"];
	 	$rowPer["permission"] = $row["permission"];
	 }

	$stmt2=$pdo->prepare("SELECT * FROM classroom WHERE id = ?");
	$stmt2->bindParam(1,$_GET['id']);
	$stmt2->execute();
	while ($row2=$stmt2->fetch()) {
		$rowID['id'] = $row2['id'];
		$rowCID['c_id'] =  $row2['c_id'];
		$rowCNAME['c_name'] = $row2['c_name'];
		$rowCTERM['c_term'] = $row2['c_term'];
		$rowCSEC['c_sec'] = $row2['c_sec'];
		$rowCYEAR['c_year'] = $row2['c_year'];
		$rowCPASS['c_password'] = $row2['c_password'];
	}

	$stmt3=$pdo->prepare("SELECT * FROM enroll WHERE c_id = ?");
	$stmt3->bindParam(1,$_GET['c_id']);
	$stmt3->execute();

	$stmt4=$pdo->prepare("SELECT * FROM news WHERE c_id = ? ");
	$stmt4->bindParam(1,$_GET['c_id']);
	$stmt4->execute();

	$stmt5 = $pdo->prepare("SELECT * FROM ta WHERE t_username = ?");
	$stmt5->bindParam(1,$_SESSION["username"]);
	$stmt5->execute();
	while ($row5=$stmt5->fetch()) {
	 	$rowUser1["t_username"] = $row5["t_username"];
	 	$rowPassword1["t_password"] = $row5["t_password"];
	 	$rowName1["t_name"] = $row5["t_name"];
	 } 

	$stmt7 = $pdo->prepare("SELECT * FROM enroll WHERE c_id = ? AND c_sec = ? AND c_term = ? AND c_year = ? AND c_name = ?");
	$stmt7->bindParam(1,$rowCID['c_id']);
	$stmt7->bindParam(2,$rowCSEC['c_sec']);
	$stmt7->bindParam(3,$rowCTERM['c_term']);
	$stmt7->bindParam(4,$rowCYEAR['c_year']);
	$stmt7->bindParam(5,$rowCNAME['c_name']);
	$stmt7->execute();

	$stmt8 = $pdo->prepare("SELECT c_sec FROM classroom WHERE c_id = ? AND c_year = ? AND c_term = ?");
	$stmt8->bindParam(1,$_GET['c_id']);
	$stmt8->bindParam(2,$rowCYEAR['c_year']);
	$stmt8->bindParam(3,$rowCTERM['c_term']);
	$stmt8->execute();

	if (!empty($_SESSION['username']) && $_SESSION['permission'] == 1 || $_SESSION['permission'] == 2) { ?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail Class</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<style type="text/css">
		.zoomnews:hover{
			transform: scale(1.05);
			box-shadow: 0px 0px 20px 10px #1e272e;
		}
	</style>
</head>
<body>

	<?php if ($_SESSION['permission'] == 1) { ?>
		<!-- Navbar --> 
	<nav class="navbar sticky-top navbar-light navbar-expand-lg" style="background-color: #747d8c;">
 		<a class="navbar-brand text-light" href="admin_home.php">CheckClassroom</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
    	</button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
		    <ul class="navbar-nav mr-auto">
		    </ul>
		    <div class="form-inline my-2 my-lg-0 mr-sm-2 col-md-2">
		    	<a href="" class="btn btn-primary  dropdown-toggle col-12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-user-tie"></i> <?= $rowName["l_name"] ?> </a>
		    	<div class="dropdown-menu col-10">
		    		<button class="dropdown-item" data-target="#profile" data-toggle="modal"> ข้อมูลส่วนตัว </button>
		    		<button class="dropdown-item" data-target="#editProfile" data-toggle="modal"> แก้ไขข้อมูลส่วนตัว </button>
		    		<div class="dropdown-divider"></div>
		    		<a href="../admin/admin_logout.php" class="dropdown-item" id="logout_button"> ออกจากระบบ </a>
		    	</div>
		    </div>
		  </div>
	</nav>

	<!-- Modal Profile -->
	<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
			       		<input type="text" name="username" class="form-control" value="<?=$rowUser['l_username']?>" readonly>
			       </div>
			       <div class="form-group">
			       		<label class="text-primary" style="font-size: 20px;"> ชื่อ - นามสกุล </label>
			       		<input type="text" name="username" class="form-control" value="<?=$rowName['l_name']?>" readonly>
			       </div>	
			       <div class="form-group">
			       		<label class="text-primary" style="font-size: 20px;"> ตำแหน่ง </label>
			       		<input type="text" name="permission" class="form-control" value="อาจารย์" readonly>
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
	<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
			       		<input type="text" name="username" class="form-control" value="<?=$rowUser['l_username']?>" readonly>
			       </div>
			       <div class="form-group">
			       		<label class="text-primary" style="font-size: 20px;"> ชื่อ - นามสกุล </label>
			       		<input type="text" name="name" class="form-control" value="<?=$rowName['l_name']?>">
			       </div>	
			        <div class="form-group">
			       		<label class="text-primary" style="font-size: 20px;"> รหัสผ่าน </label>
			       		<input type="text" name="password" class="form-control" value="<?=$rowPassword['l_password']?>">
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
	<?php } elseif ($_SESSION['permission'] == 2) { ?>
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

	<?php 
		if (!empty($_COOKIE["add_student_success"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#add_success').alert('fade');
        				setTimeout(function(){
        					$('#add_success').alert('close');
        				}, 3000);
    				});
    				$('#add_success').click(function(){
    					$('add_success').alert('close');
    				});
			</script>
			<div class="alert alert-success alert-dismissible fade show" role="alert" id="add_success">
				<center>
					<strong>Add student Success!</strong>
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["add_student_fail"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#add_fail').alert('fade');
        				setTimeout(function(){
        					$('#add_fail').alert('close');
        				}, 3000);
    				});
    				$('#add_fail').click(function(){
    					$('add_fail').alert('close');
    				});
			</script>
			<div class="alert alert-danger alert-dismissible fade show" role="alert" id="add_fail">
				<center>
					<strong>Add Student Failed!</strong> กรุณาลองใหม่อีกครั้ง
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["add_student_same"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#add_fail').alert('fade');
        				setTimeout(function(){
        					$('#add_fail').alert('close');
        				}, 3000);
    				});
    				$('#add_fail').click(function(){
    					$('add_fail').alert('close');
    				});
			</script>
			<div class="alert alert-danger alert-dismissible fade show" role="alert" id="add_fail">
				<center>
					<strong>Add Student Failed!</strong> มีข้อมูลนักศึกษาใน class section อื่น หรือ อยู่ใน class นี้แล้ว 
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["edit_student_success"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#edit_student_success').alert('fade');
        				setTimeout(function(){
        					$('#edit_student_success').alert('close');
        				}, 3000);
    				});
    				$('#edit_student_success').click(function(){
    					$('edit_student_success').alert('close');
    				});
			</script>
			<div class="alert alert-success alert-dismissible fade show" role="alert" id="edit_student_success">
				<center>
					<strong>Edit Student Success!</strong>
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["edit_student_error"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#edit_student_error').alert('fade');
        				setTimeout(function(){
        					$('#edit_student_error').alert('close');
        				}, 3000);
    				});
    				$('#edit_student_error').click(function(){
    					$('edit_student_error').alert('close');
    				});
			</script>
			<div class="alert alert-danger alert-dismissible fade show" role="alert" id="edit_student_error">
				<center>
					<strong>Edit Student Failed!</strong> กรุณาลองใหม่อีกครั้ง
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["delete_student_success"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#delete_student_success').alert('fade');
        				setTimeout(function(){
        					$('#delete_student_success').alert('close');
        				}, 3000);
    				});
    				$('#delete_student_success').click(function(){
    					$('delete_student_success').alert('close');
    				});
			</script>
			<div class="alert alert-success alert-dismissible fade show" role="alert" id="delete_student_success">
				<center>
					<strong>Delete Student Success!</strong>
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["delete_student_fail"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#delete_student_fail').alert('fade');
        				setTimeout(function(){
        					$('#delete_student_fail').alert('close');
        				}, 3000);
    				});
    				$('#delete_student_fail').click(function(){
    					$('delete_student_fail').alert('close');
    				});
			</script>
			<div class="alert alert-danger alert-dismissible fade show" role="alert" id="delete_student_fail">
				<center>
					<strong>Delete Student Failed!</strong> กรุณาลองใหม่อีกครั้ง
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>


	

	<div style="min-height: 850px;background-color: #ecf0f1;">
		<div style="background-color: #BEBEBE; padding-top: 20px; padding-bottom: 20px;">
						<div class="form-group" style="text-align: center;">
							<label style="font-size: 30px;"> <?= $rowCID['c_id'] ?> </label> &nbsp; <label style="font-size: 30px;">  <?= $rowCNAME['c_name'] ?> &nbsp; Section : <?=$rowCSEC['c_sec']?></label>
						</div><br>
						<div class="form-group" style="text-align: center;">
							(&nbsp;<label style="font-size: 30px;"><?=$rowCTERM['c_term']?></label>&nbsp;/&nbsp;<label style="font-size: 30px;"><?=$rowCYEAR['c_year']?></label>&nbsp;)
						</div>
					</div>
		<div style="display: flex;">
					
					<div style="background-color: #ced6e0; min-height: 700px;width: 300px; padding-top: 50px;padding-bottom: 50px;">
						<div class="form-group mb-3 justify-content-center" style="text-align: center; ">
							<button id="add_student_button" data-target="#addStd" data-toggle="modal" class="btn btn-primary btn-lg col-10" style="background-color: #4682B4;"> เพิ่มนักศึกษา </button>
						</div>
						<div class="form-group mb-3 justify-content-center" style="text-align: center; ">
							<button id="add_student_file_button" data-target="#add_student_file_modal" data-toggle="modal" class="btn btn-primary btn-lg col-10" style="background-color: #4682B4;"> อัพโหลดข้อมูลนักศึกษา </button>
						</div>		
						
						<div class="form-group mb-3 justify-content-center" style="text-align: center;">
							<a href="admin_home.php" class="btn btn-danger btn-lg col-10"> ย้อนกลับ </a>
						</div>				
					</div>

					<div style="background-color:#f1f2f6;min-width: 85%;min-height: 500px;padding: 50px;">
						<div class="table-responsive-sm" >
						<table class="table table-dark table-hover" style="border-radius: 20px; box-shadow: 0px 0px 50px 25px #1e272e;">
							<thead class="text-white bg-info" style="font-size: 20px;">
								<tr>
									<th>รหัสนักศึกษา</th>
									<th>ชื่อ-นามสกุล</th>
									<th>สาขาวิชา</th>
									<th>สถานะ</th>
									<th></th>
								</tr>
							</thead>
							<tbody style="font-size: 16px;">
								
								<?php while ($row7=$stmt7->fetch()) { ?>
									
									<tr>
										<td><?=$row7['s_id']?></td>
										<td><?=$row7['s_name']?></td>
										<td><?=$row7['s_department']?></td>
										<?php if ($row7['status'] == 1) { ?>
											<td class="text-success">ลงทะเบียน</td>
										<?php }if ($row7['status'] == 2) { ?>
											<td class="text-warning">ถอนรายวิชา</td>
										<?php }if ($row7['status'] == 3) { ?>
											<td class="text-danger">ลาออก</td>
										<?php } ?>								
										<td> 
											<button class="btn btn-warning" data-toggle="modal" data-target="#edit_student<?=$row7['enroll_id']?>"><i class="fas fa-user-edit"></i>&nbsp;&nbsp;แก้ไข section</button> &nbsp;||&nbsp;
											<button class="btn btn-warning" data-toggle="modal" data-target="#edit_student_sec<?=$row7['enroll_id']?>"><i class="fas fa-user-edit"></i>&nbsp;&nbsp;แก้ไขสถานะ</button> &nbsp;||&nbsp;
											<button class="btn btn-danger" data-toggle="modal" data-target="#delete_student<?=$row7['enroll_id']?>"><i class="fas fa-user-minus"></i>&nbsp;&nbsp;ลบ</button>
										</td>
									</tr>

									<!-- Modal Delete Student  -->
									<form action="delete_student.php" name="edit_student_form" method="post">
										<div class="modal fade" id="delete_student<?=$row7['enroll_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLongTitle">Delete Student</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										      	<input type="hidden" name="enroll_id" value="<?=$row7['enroll_id']?>">
										      	<input type="hidden" name="id" value="<?=$rowID['id']?>">
				      							<input type="hidden" name="c_id" value="<?=$rowCID['c_id']?>">
				      							<input type="hidden" name="c_sec" value="<?=$rowCSEC['c_sec']?>">
												<label class="text-primary" style="font-size: 20px;"> แน่ใจหรือไม่ที่จะลบ : </label>&nbsp;&nbsp;<label class="text-danger"><?=$row7['s_id']?>&nbsp;<?=$row7['s_name']?> </label>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
										        <button type="submit" class="btn btn-primary" id="delete_submit_button">ลบ</button>
										      </div>
										    </div>
										  </div>
										</div>
									</form>
								
									<!-- Modal Edit Student  -->
									<form action="edit_student_form.php" name="edit_student_form<?=$row7['enroll_id']?>" method="post">
										<div class="modal fade" id="edit_student<?=$row7['enroll_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLongTitle">Edit Student</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										      	<input type="hidden" name="enroll_id" value="<?=$row7['enroll_id']?>">
										      	<input type="hidden" name="id" value="<?=$rowID['id']?>">
				      							<input type="hidden" name="c_id" value="<?=$rowCID['c_id']?>">
				      							<input type="hidden" name="c_sec" value="<?=$rowCSEC['c_sec']?>">
				      							<input type="hidden" name="c_year" value="<?=$rowCYEAR['c_year']?>">
				      							<input type="hidden" name="c_term" value="<?=$rowCTERM['c_term']?>">
										        <label class="text-primary" style="font-size: 20px;">ไปที่หน้าแก้ไขข้อมูลของ : </label>&nbsp;&nbsp; <label class="text-danger" style="font-size: 18px;"><?=$row7['s_name']?></label>
										      </div>

										      
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
										        <button type="submit" class="btn btn-primary" id="edit_submit_button">แก้ไข</button>
										      </div>
										    </div>
										  </div>
										</div>
									</form>

									<!-- Modal Edit Student Section  -->
									<form action="edit_student_sec_form.php" name="edit_student_sec_form<?=$row7['enroll_id']?>" method="post">
										<div class="modal fade" id="edit_student_sec<?=$row7['enroll_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLongTitle">Edit Student Section</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										      	<input type="hidden" name="enroll_id" value="<?=$row7['enroll_id']?>">
										      	<input type="hidden" name="id" value="<?=$rowID['id']?>">
				      							<input type="hidden" name="c_id" value="<?=$rowCID['c_id']?>">
				      							<input type="hidden" name="c_sec" value="<?=$rowCSEC['c_sec']?>">
				      							<input type="hidden" name="c_year" value="<?=$rowCYEAR['c_year']?>">
				      							<input type="hidden" name="c_term" value="<?=$rowCTERM['c_term']?>">
										       <div class="form-group">
										       		<label class="text-primary" style="font-size: 20px;"> รหัสนักศึกษา </label>
										       		<input type="text" name="s_id" value="<?=$row7['s_id']?>" class="form-control" readonly="">
										       </div>
										       <div class="form-group">
										       		<label class="text-primary" style="font-size: 20px;"> ชื่อ-นามสกุล </label>
										       		<input type="text" name="s_name" value="<?=$row7['s_name']?>" class="form-control" readonly="">
										       </div>
										       <div class="form-group">
										       		<label class="text-primary" style="font-size: 20px;"> สาขาวิชา </label>
										       		<input type="text" name="s_department" value="<?=$row7['s_department']?>" class="form-control" readonly="">
										       </div>
										       <div class="form-group">
										       		<label class="text-primary" style="font-size: 20px;"> สถานะ </label>
										       		<?php if ($row7['status'] == 1) { ?>
														<select name="status" class="form-control">
															<option value="1" selected=""> ลงทะเบียน </option>
															<option value="2"> ถอนรายวิชา </option>
															<option value="3"> ลาออก </option>
														</select>
													<?php } elseif ($row7['status'] == 2) { ?>
														<select name="status" class="form-control">
															<option value="2" selected=""> ถอนรายวิชา </option>
															<option value="1"> ลงทะเบียน </option>
															<option value="3"> ลาออก </option>
														</select>
													<?php } elseif ($row7['status'] == 3) { ?>
														<select name="status" class="form-control">
															<option value="3" selected=""> ลาออก </option>
															<option value="1"> ลงทะเบียน </option>
															<option value="2"> ถอนรายวิชา </option>
														</select>
													<?php } ?>
										       </div>
										      </div>

										      
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
										        <button type="submit" class="btn btn-primary" id="edit_submit_button">แก้ไข</button>
										      </div>
										    </div>
										  </div>
										</div>
									</form>

								<?php } ?>	

							</tbody>
						</table>
						</div>
					</div>			
			</div>

			<!-- Modal Add Student By file -->
		<form action="add_student_file1.php" method="post" name="add_student_file" id="add_student_file" enctype="multipart/form-data">
			<div class="modal fade" id="add_student_file_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
				  <div class="modal-dialog" role="document" >
				    <div class="modal-content " style="box-shadow: 0px 0px 50px 25px #1e272e;width: 600px;">
				      <div class="modal-header">
				        <h3 class="modal-title" id="exampleModalLabel">Add Student</h3>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<input type="hidden" name="id" value="<?=$rowID['id']?>">
				      	<input type="hidden" name="c_id" value="<?=$rowCID['c_id']?>">
				      	<input type="hidden" name="c_name" value="<?=$rowCNAME['c_name']?>">
				      	<input type="hidden" name="c_sec" value="<?=$rowCSEC['c_sec']?>">
				      	<input type="hidden" name="c_year" value="<?=$rowCYEAR['c_year']?>">
				      	<input type="hidden" name="c_term" value="<?=$rowCTERM['c_term']?>">
				      	<div class="form-group">
				      		<label class="text-primary" style="font-size: 20px;">เพิ่มข้อมูลนักศึกษา</label>
				      		<input type="file" name="student_file" id="student_file" accept=".xls,.xlsx,.csv" class="form-control mr-sm-2">
				      	</div>
					     
				      </div>		      
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" name="submit_student_button" id="submit_student_button" class="btn btn-primary"> submit </button>
				      </div>
				    </div>
				  </div>
				</div>
		</form>
			

			<!-- Modal Add student -->

			<?php 
				$stmt6=$pdo->prepare("SELECT * FROM student");
				$stmt6->execute();
			?>


			<form action="add_student1.php" method="post" name="add_student_form" onSubmit="JavaScript:return addStudent();">
			<div class="modal fade" id="addStd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
				  <div class="modal-dialog" role="document" >
				    <div class="modal-content " style="box-shadow: 0px 0px 50px 25px #1e272e;width: 600px;">
				      <div class="modal-header">
				        <h3 class="modal-title" id="exampleModalLabel">Add Student</h3>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<input type="hidden" name="id" value="<?=$rowID['id']?>">
				      	<input type="hidden" name="c_id" value="<?=$rowCID['c_id']?>">
				      	<input type="hidden" name="c_sec" value="<?=$rowCSEC['c_sec']?>">
					     <table class="table table-hover">
					     	<thead>
					     		<tr>
					     			<th>รหัสนักศึกษา</th>
					     			<th>ชื่อ-นามสกุล</th>
					     			<th>สาขาวิชา</th>
					     			<th></th>
					     		</tr>
					     	</thead>
					     	<tbody>
					     		<?php $i=0; $k=0; while ($row6=$stmt6->fetch()) { ?>
					     			<tr>
						     			<td><input type="hidden" name="s_id[]" value="<?=$row6['s_id']?>"><?=$row6['s_id']?></td>
						     			<td><input type="hidden" name="s_name[]" value="<?=$row6['s_name']?>"><?=$row6['s_name']?></td>
						     			<td><input type="hidden" name="s_department[]" value="<?=$row6['s_department']?>"><?=$row6['s_department']?></td>
						     			<td>
						     				
											  <input type="checkbox" name="Ch_INSERT[]" id="Ch_INSERT<?=$k++?>" value="<?=$i++?>">
											 
											</div>
										</td>
						     		</tr>
					     		<?php } ?>				     		
					     	</tbody>
					     </table>
					     <div class="form-group mb-4">
					     	<label class="text-primary"> Code : </label>
					     	<input type="text" name="c_password" class="form-control"  value="<?=$rowCPASS['c_password']?>" readonly>
					     </div>  
				      </div>		      
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary" id="SAVE" name="add_student_submit[]" value="SAVE"> Submit </button>
				      </div>
				    </div>
				  </div>
				</div>
			</form>
		</div>

	<footer style="background-color: #747d8c; padding: 24px;">
		<div style="text-align: center;">
			<label style="font-size: 18px; color: white; padding: 9px;">@Copyright By 5 สหายคล้ายจะเป็นลม</label>
		</div>		
	</footer>

	<script type="text/javascript">
		function addStudent()
		{
			if(document.add_student_form.s_id.value == "")
			{
				alert('กรุณากรอก รหัสนักศึกษา');
				document.add_student_form.s_id.focus();
				return false;
			}	
			if(document.add_student_form.s_name.value == "")
			{
				alert('กรุณากรอก ชื่อนักศึกษา');
				document.add_student_form.s_name.focus();		
				return false;
			}
			if(document.add_student_form.s_sec.value == "")
			{
				alert('กรุณากรอก Section');
				document.add_student_form.s_sec.focus();		
				return false;
			}	
			if(document.add_student_form.c_password.value == "")
			{
				alert('กรุณากรอก รหัส join');
				document.add_student_form.c_password.focus();		
				return false;
			}	
			document.add_student_form.submit();
		}
		function addNews()
		{
			if(document.add_news_form.n_title.value == "")
			{
				alert('กรุณากรอก หัวข้อเรื่อง');
				document.add_news_form.n_title.focus();
				return false;
			}	
			if(document.add_news_form.n_description.value == "")
			{
				alert('กรุณากรอก รายละเอียด');
				document.add_news_form.n_description.focus();		
				return false;
			}
			document.add_news_form.submit();
		}
		function editNews()
		{
			if(document.edit_news_form.n_title.value == "")
			{
				alert('กรุณากรอก หัวข้อเรื่อง');
				document.edit_news_form.n_title.focus();
				return false;
			}	
			if(document.edit_news_form.n_description.value == "")
			{
				alert('กรุณากรอก รายละเอียด');
				document.edit_news_form.n_description.focus();		
				return false;
			}
			document.edit_news_form.submit();
		}
	</script>

</body>
</html>

<?php } else {
		setcookie('wrong_login',1,time()+10,'/');
		echo "<script type='text/javascript'> window.location.href = '../index.php';</script>";
	} ?>