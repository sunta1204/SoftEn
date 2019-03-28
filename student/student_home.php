<?php 
	include '../connect.php'; 
	session_start();
	$stmt = $pdo->prepare("SELECT * FROM student WHERE s_id = ?");
	$stmt->bindParam(1,$_SESSION["username"]);
	$stmt->execute();
	while ($row=$stmt->fetch()) {
	 	$rowUser["s_id"] = $row["s_id"];
	 	$rowPassword["s_password"] = $row["s_password"];
	 	$rowName["s_name"] = $row["s_name"];
	 } 

	$stmt2=$pdo->prepare("SELECT * FROM enroll WHERE s_id = ?");
	$stmt2->bindParam(1,$_SESSION['username']);
	$stmt2->execute();

	if (!empty($_SESSION['username']) && $_SESSION['permission'] == 3) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style type="text/css">
		.zoomclass{
			max-width: 500px;
			max-height: 500px;		
			transition: transform .2s;
		}
		.zoomclass:hover{
			transform: scale(1.05);
			box-shadow: 0px 0px 20px 10px #1e272e;
		}
	</style>
</head>
<body>
	<!-- Navbar --> 
	<nav class="navbar sticky-top navbar-light navbar-expand-lg" style="background-color: #747d8c;">
 		<a class="navbar-brand text-light" href="studuent_home.php">CheckClassroom</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
    	</button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		    	<!--
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Link</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
		        <a class="nav-link disabled" href="#">Disabled</a>
		      </li> -->
		    </ul>
		    <!--
		    <div class="form-inline">
		    	<button data-target="#join_class" data-toggle="modal" class="btn btn-outline-light"><i class="fas fa-plus"></i></button>
		    </div> -->
		    <div class="form-inline my-2 my-lg-0 mr-sm-2 col-md-2">
		    	
		    	<a href="" class="btn btn-primary  dropdown-toggle col-12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-user-tie"></i> <?= $rowName["s_name"] ?> </a>
		    	<div class="dropdown-menu col-10">
		    		<button class="dropdown-item" data-target="#profile" data-toggle="modal"> ข้อมูลส่วนตัว </button>
		    		<button class="dropdown-item" data-target="#editProfile" data-toggle="modal"> แก้ไขข้อมูลส่วนตัว </button>
		    		<div class="dropdown-divider"></div>
		    		<a href="../student/student_logout.php" class="dropdown-item"> ออกจากระบบ </a>
		    	</div>
		    </div>
		  </div>
	</nav>

	<!-- Modal Profile 
	<div class="modal fade" id="join_class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content " style="box-shadow: 0px 0px 50px 25px #1e272e;">
		      <div class="modal-header">
		        <h3 class="modal-title" id="exampleModalLabel">Join Class</h3>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      	<div class="modal-body" style="padding: 50px;">
			       	<div class="form-group">
					    <label class="text-primary mb-3" style="font-size: 20px;">รหัส Join Class : </label>
					    <input type="text" class="form-control" required="">					    
					</div>
		      </div>		      
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div> -->

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
			       		<input type="text" name="username" class="form-control" value="<?=$rowUser['s_id']?>" readonly>
			       </div>
			       <div class="form-group">
			       		<label class="text-primary" style="font-size: 20px;"> ชื่อ - นามสกุล </label>
			       		<input type="text" name="username" class="form-control" value="<?=$rowName['s_name']?>" readonly>
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
			       		<input type="text" name="username" class="form-control" value="<?=$rowUser['s_id']?>" readonly>
			       </div>
			       <div class="form-group">
			       		<label class="text-primary" style="font-size: 20px;"> ชื่อ - นามสกุล </label>
			       		<input type="text" name="name" class="form-control" value="<?=$rowName['s_name']?>">
			       </div>	
			        <div class="form-group">
			       		<label class="text-primary" style="font-size: 20px;"> รหัสผ่าน </label>
			       		<input type="text" name="password" class="form-control" value="<?=$rowPassword['s_password']?>">
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

	<?php 
		if (!empty($_COOKIE["login_success"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#login_success').alert('fade');
        				setTimeout(function(){
        					$('#login_success').alert('close');
        				}, 3000);
    				});
    				$('#login_success').click(function(){
    					$('login_success').alert('close');
    				});
			</script>
			<div class="alert alert-success alert-dismissible fade show" role="alert" id="login_success">
				<center>
					<strong>Login Success!</strong> สวัสดี คุณ <?= $rowName["s_name"] ?>
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["logout_error"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#logout_error').alert('fade');
        				setTimeout(function(){
        					$('#logout_error').alert('close');
        				}, 3000);
    				});
    				$('#logout_error').click(function(){
    					$('logout_error').alert('close');
    				});
			</script>
			<div class="alert alert-danger alert-dismissible fade show" role="alert" id="logout_error">
				<center>
					<strong>Logout Failed!</strong> กรุณาลองใหม่อีกครั้ง
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["edit_profile_success"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#edit_profile_success').alert('fade');
        				setTimeout(function(){
        					$('#edit_profile_success').alert('close');
        				}, 3000);
    				});
    				$('#edit_profile_success').click(function(){
    					$('edit_profile_success').alert('close');
    				});
			</script>
			<div class="alert alert-success alert-dismissible fade show" role="alert" id="edit_profile_success">
				<center>
					<strong>Edit Profile Success !</strong> 
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["edit_profile_error"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#edit_profile_error').alert('fade');
        				setTimeout(function(){
        					$('#edit_profile_error').alert('close');
        				}, 3000);
    				});
    				$('#edit_profile_error').click(function(){
    					$('edit_profile_error').alert('close');
    				});
			</script>
			<div class="alert alert-danger alert-dismissible fade show" role="alert" id="edit_profile_error">
				<center>
					<strong>Edit Profile Failed !</strong> กรุณาลองใหม่อีกครั้ง
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<div style="padding-top: 50px;padding-bottom: 50px;min-height: 850px;background-color: #ecf0f1;">
		<div class="form-inline d-flex " style="margin-left: 20px;">
			<?php while ($row2=$stmt2->fetch()) {?>
				<div class="card-deck my-2 my-lg-0 mr-sm-2 mb-4">
				<div class="card bg-info zoomclass mb-4">
					<a href="detail_class.php?c_id=<?=$row2['c_id']?>">
						<div class="card-header">
								<p class="card-text text-white" style="font-size: 20px;"> รหัสวิชา : <?=$row2['c_id']?> </p>
							</div>
						<div class="card-body">							
							<div class="form-group mr-sm-2">
								<p class="card-text text-white" style="font-size: 20px;"> รหัสวิชา : <?=$row2['c_id']?> </p>
							</div>
							<div class="form-group mr-sm-2">
								<p class="card-text text-white" style="font-size: 20px;"> ชื่อวิชา : <?=$row2['c_name']?> </p>
							</div>													 
						</div>
					</a>
				</div>
			</div>		
			<?php } ?>		
		</div>	
	</div>

	<footer style="background-color: #747d8c; padding: 24px;">
		<div style="text-align: center;">
			<label style="font-size: 18px; color: white; padding: 9px;">@Copyright By 5 สหายคล้ายจะเป็นลม</label>
		</div>		
	</footer>

	<script type="text/javascript">
		function fncSubmit()
		{
			if(document.create_class_form.c_id.value == "")
			{
				alert('กรุณากรอก รหัสวิชา');
				document.create_class_form.c_id.focus();
				return false;
			}	
			if(document.create_class_form.c_name.value == "")
			{
				alert('กรุณากรอก ชื่อวิชา');
				document.create_class_form.c_name.focus();		
				return false;
			}
			if(document.create_class_form.c_year.value == "")
			{
				alert('กรุณากรอก ปีการศึกษา');
				document.create_class_form.c_year.focus();		
				return false;
			}	
			if(document.create_class_form.c_term.value == "")
			{
				alert('กรุณากรอก ภาคการเรียน');
				document.create_class_form.c_term.focus();		
				return false;
			}	
			if(document.create_class_form.c_password.value == "")
			{
				alert('กรุณากรอก รหัส join');
				document.create_class_form.c_password.focus();		
				return false;
			}		
			document.create_class_form.submit();
		}

		function editSubmit()
		{
			if(document.edit_profile.username.value == "")
			{
				alert('กรุณากรอก รหัสวิชา');
				document.edit_profile.username.focus();
				return false;
			}	
			if(document.edit_profile.name.value == "")
			{
				alert('กรุณากรอก ชื่อวิชา');
				document.edit_profile.name.focus();		
				return false;
			}
			if(document.edit_profile.password.value == "")
			{
				alert('กรุณากรอก ปีการศึกษา');
				document.edit_profile.password.focus();		
				return false;
			}	
			document.edit_profile.submit();
		}

		
	</script>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php } else {
		setcookie('wrong_login',1,time()+10,'/');
		echo "<script type='text/javascript'> window.location.href = '../index.php';</script>";
	} ?>