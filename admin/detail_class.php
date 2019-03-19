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
		    	<!--
		      <li class="nav-item active">
		        <a class="nav-link" href="#" style="color: #D3D3D3" >Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#" style="color: #D3D3D3" >Link</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #D3D3D3" >
		          Dropdown
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Action</a>
		          <a class="dropdown-item" href="#">Another action</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link disabled" href="#" style="color: #D3D3D3" >Disabled</a>
		      </li> -->
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
		    	<!--
		      <li class="nav-item active">
		        <a class="nav-link" href="#" style="color: #D3D3D3" >Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#" style="color: #D3D3D3" >Link</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #D3D3D3" >
		          Dropdown
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Action</a>
		          <a class="dropdown-item" href="#">Another action</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link disabled" href="#" style="color: #D3D3D3" >Disabled</a>
		      </li> -->
		    </ul>
		    <div class="form-inline my-2 my-lg-0 mr-sm-2 col-md-2">
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
		if (!empty($_COOKIE["add_success"])){ ?>
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
		if (!empty($_COOKIE["add_fail"])){ ?>
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
		if (!empty($_COOKIE["add_news_success"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#add_news_success').alert('fade');
        				setTimeout(function(){
        					$('#add_news_success').alert('close');
        				}, 3000);
    				});
    				$('#add_news_success').click(function(){
    					$('add_news_success').alert('close');
    				});
			</script>
			<div class="alert alert-success alert-dismissible fade show" role="alert" id="add_news_success">
				<center>
					<strong>Add News Success!</strong>
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["add_news_error"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#add_news_error').alert('fade');
        				setTimeout(function(){
        					$('#add_news_error').alert('close');
        				}, 3000);
    				});
    				$('#add_news_error').click(function(){
    					$('add_news_error').alert('close');
    				});
			</script>
			<div class="alert alert-danger alert-dismissible fade show" role="alert" id="add_news_error">
				<center>
					<strong>Add News Failed!</strong> กรุณาลองใหม่อีกครั้ง
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["edit_news_success"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#edit_news_success').alert('fade');
        				setTimeout(function(){
        					$('#edit_news_success').alert('close');
        				}, 3000);
    				});
    				$('#edit_news_success').click(function(){
    					$('edit_news_success').alert('close');
    				});
			</script>
			<div class="alert alert-success alert-dismissible fade show" role="alert" id="edit_news_success">
				<center>
					<strong>Edit News Success!</strong>
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["edit_news_error"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#edit_news_error').alert('fade');
        				setTimeout(function(){
        					$('#edit_news_error').alert('close');
        				}, 3000);
    				});
    				$('#edit_news_error').click(function(){
    					$('edit_news_error').alert('close');
    				});
			</script>
			<div class="alert alert-danger alert-dismissible fade show" role="alert" id="edit_news_error">
				<center>
					<strong>Edit News Failed!</strong> กรุณาลองใหม่อีกครั้ง
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["delete_news_success"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#delete_news_success').alert('fade');
        				setTimeout(function(){
        					$('#delete_news_success').alert('close');
        				}, 3000);
    				});
    				$('#delete_news_success').click(function(){
    					$('delete_news_success').alert('close');
    				});
			</script>
			<div class="alert alert-success alert-dismissible fade show" role="alert" id="delete_news_success">
				<center>
					<strong>Delete News Success!</strong>
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["delete_news_error"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#delete_news_error').alert('fade');
        				setTimeout(function(){
        					$('#delete_news_error').alert('close');
        				}, 3000);
    				});
    				$('#delete_news_error').click(function(){
    					$('delete_news_error').alert('close');
    				});
			</script>
			<div class="alert alert-danger alert-dismissible fade show" role="alert" id="delete_news_error">
				<center>
					<strong>Delete News Failed!</strong> กรุณาลองใหม่อีกครั้ง
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<div style="min-height: 850px;background-color: #ecf0f1;">
		<div style="background-color: #BEBEBE; padding-top: 20px; padding-bottom: 20px;">
						<div class="form-group" style="text-align: center;">
							<label style="font-size: 30px;"> <?= $rowCID['c_id'] ?> </label> &nbsp; <label style="font-size: 30px;">  <?= $rowCNAME['c_name'] ?> </label>
						</div><br>
						<div class="form-group" style="text-align: center;">
							(&nbsp;<label style="font-size: 30px;"><?=$rowCTERM['c_term']?></label>&nbsp;/&nbsp;<label style="font-size: 30px;"><?=$rowCYEAR['c_year']?></label>&nbsp;)
						</div>
					</div>
		<div style="display: flex;">
					
					<div style="background-color: #ced6e0; min-height: 700px;width: 300px; padding-top: 50px;padding-bottom: 50px;">
						<div id="add_studen_button" class="form-group mb-3 justify-content-center" style="text-align: center; ">
							<button id="add_student_button" data-target="#addStd" data-toggle="modal" class="btn btn-primary btn-lg col-10" style="background-color: #4682B4;"> เพิ่มนักศึกษา </button>
						</div>	
						<div id="add_news_button" class="form-group mb-3 justify-content-center" style="text-align: center; ">
							<button id="add_student_button" data-target="#addnews" data-toggle="modal" class="btn btn-primary btn-lg col-10" style="background-color: #4682B4;"> เพิ่มข่าวสาร </button>
						</div>	
						<div class="form-group mb-3 justify-content-center" style="text-align: center;">
							<a href="admin_home.php" class="btn btn-danger btn-lg col-10"> ย้อนกลับ </a>
						</div>				
					</div>

					<div style="background-color:#f1f2f6;min-width: 85%;min-height: 500px;padding: 50px;">
						<div class="form-inline">
							<?php while ($row4=$stmt4->fetch()) { ?>
								<?php if (!empty($row4)) { ?>
									<div class="card zoomnews text-white bg-dark mb-3 mr-sm-4" style="max-width: 500px;min-width: 300px;min-height: 300px;max-height: 500px;transition: transform .2s;">
								  <div class="card-header"><?=$row4['n_title']?></div>
								  <div class="card-body">
								    <p class="card-text"> <?=$row4['n_description']?></p><br>
								    <small class="card-text"> <?=$row4['n_date']?></small><br>
								    <small class="card-text"> <?=$row4['l_name']?></small>
								  </div>
								  <div class="card-footer">
								  	<button  data-target="#edit_news?id=<?=$row4['id']?>" data-toggle="modal" class="btn btn-warning"><i class="fas fa-edit"></i>&nbsp;แก้ไข</button>
								  	<button  data-target="#delete_news?id=<?=$row4['id']?>" data-toggle="modal" class="btn btn-danger"><i class="fas fa-trash"></i>&nbsp;ลบ</button>
								  </div>
								</div>

								<!-- Modal edit news -->
								<form action="edit_news.php" method="post" name="edit_news_form" onSubmit="JavaScript:return editNews();">
								<div class="modal fade" id="edit_news?id=<?=$row4['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-dialog-centered" role="document">
									    <div class="modal-content " style="box-shadow: 0px 0px 50px 25px #1e272e;">
									      <div class="modal-header">
									        <h3 class="modal-title" id="exampleModalLabel">Edit News</h3>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									      	<input type="hidden" name="id" value="<?=$row4['id']?>">
									      	<input type="hidden" name="classroom_id" value="<?=$rowID['id']?>">
									      	<input type="hidden" name="c_id" value="<?=$rowCID['c_id']?>">
										     <div class="form-inline"> 
										     	<label class="text-primary mr-sm-4" style="font-size: 20px;"> หัวข้อเรื่อง : </label>
										     	<input type="text" name="n_title" class="form-control" value="<?=$row4['n_title']?>">
										     </div><br>
										     <div class="form-inline"> 
										     	<label class="text-primary mr-sm-4" style="font-size: 20px;"> รายละเอียด : </label>
										     	<input type="text" name="n_description" class="form-control" value="<?=$row4['n_description']?>">
										     </div><br>
									      </div>		      
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									        <button type="submit" class="btn btn-primary" id="edit_news_submit"> Submit </button>
									      </div>
									    </div>
									  </div>
									</div>
								</form>

								<!-- Modal delete news -->
								<form action="delete_news.php" method="post" name="delete_news_form">
								<div class="modal fade" id="delete_news?id=<?=$row4['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-dialog-centered" role="document">
									    <div class="modal-content " style="box-shadow: 0px 0px 50px 25px #1e272e;">
									      <div class="modal-header">
									        <h3 class="modal-title" id="exampleModalLabel">Delete News</h3>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									      	<input type="hidden" name="id" value="<?=$row4['id']?>">
									      	<input type="hidden" name="classroom_id" value="<?=$rowID['id']?>">
									      	<input type="hidden" name="c_id" value="<?=$rowCID['c_id']?>">
										     <div class="form-group">
										     	<label class="text-primary" style="font-size: 20px;"> คุณแน่ใจหรือไม่ ที่จะลบ </label> &nbsp; : &nbsp;
										     	<label class="text-danger" style="font-size: 20px;"> <?=$row4['n_title']?> </label>
										     </div>
									      </div>		      
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									        <button type="submit" class="btn btn-primary" id="edit_news_submit"> Submit </button>
									      </div>
									    </div>
									  </div>
									</div>
								</form>

								<?php } else { ?>
									<div></div>
								<?php } ?>
								
							<?php } ?>
						</div>
						
					</div>			
			</div>

			<!-- Modal Add student -->
			<form action="add_student.php" method="post" name="add_student_form" onSubmit="JavaScript:return addStudent();">
			<div class="modal fade" id="addStd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content " style="box-shadow: 0px 0px 50px 25px #1e272e;">
				      <div class="modal-header">
				        <h3 class="modal-title" id="exampleModalLabel">Add Student</h3>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<input type="hidden" name="id" value="<?=$rowID['id']?>">
				      	<input type="hidden" name="c_id" value="<?=$rowCID['c_id']?>">
					     <div class="form-group mb-4">
					     	<label class="text-primary"> รหัสนักศึกษา : </label>
					     	<input type="text" name="s_id" class="form-control" >
					     </div>
					     <div class="form-group mb-4">
					     	<label class="text-primary"> ชื่อนักศึกษา : </label>
					     	<input type="text" name="s_name" class="form-control" >
					     </div>  
					     <div class="form-group mb-4">
					     	<label class="text-primary"> Section : </label>
					     	<input type="text" name="s_sec" class="form-control" >
					     </div>  
					     <div class="form-group mb-4">
					     	<label class="text-primary"> Code : </label>
					     	<input type="text" name="c_password" class="form-control"  value="<?=$rowCPASS['c_password']?>" readonly>
					     </div>  
				      </div>		      
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary" id="create_class_submit"> Submit </button>
				      </div>
				    </div>
				  </div>
				</div>
			</form>

			<!-- Modal Add news -->
			<form action="add_news.php" method="post" name="add_news_form" onSubmit="JavaScript:return addNews();">
			<div class="modal fade" id="addnews" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content " style="box-shadow: 0px 0px 50px 25px #1e272e;">
				      <div class="modal-header">
				        <h3 class="modal-title" id="exampleModalLabel">Add News</h3>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<input type="hidden" name="l_username" value="<?=$rowUser['l_username']?>">
				      	<input type="hidden" name="l_name" value="<?=$rowName['l_name']?>">
				      	<input type="hidden" name="classroom_id" value="<?=$rowID['id']?>">
				      	<input type="hidden" name="c_id" value="<?=$rowCID['c_id']?>">
					     <div class="from-group mb-4">
					     	<label class="text-primary"> หัวข้อเรื่อง : </label>
					     	<input type="text" name="n_title" class="form-control">
					     </div>
					     <div class="from-group mb-4">
					     	<label class="text-primary"> รายละเอียด : </label>
					     	<input type="text" name="n_description" class="form-control" >
					     </div>  
				      </div>		      
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary" id="add_news_submit"> Submit </button>
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