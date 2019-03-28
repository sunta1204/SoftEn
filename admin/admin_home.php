<?php 
	include '../connect.php'; 
	session_start();

	$stmt = $pdo->prepare("SELECT * FROM teacher WHERE l_username = ?");
	$stmt->bindParam(1,$_SESSION["username"]);
	$stmt->execute();
	while ($row=$stmt->fetch()) {
	 	$rowUser["l_username"] = $row["l_username"];
	 	$rowPassword["l_password"] = $row["l_password"];
	 	$rowName["l_name"] = $row["l_name"];
	 } 

	$stmt4 = $pdo->prepare("SELECT * FROM ta WHERE t_username = ?");
	$stmt4->bindParam(1,$_SESSION["username"]);
	$stmt4->execute();
	while ($row4=$stmt4->fetch()) {
	 	$rowUser1["t_username"] = $row4["t_username"];
	 	$rowPassword1["t_password"] = $row4["t_password"];
	 	$rowName1["t_name"] = $row4["t_name"];
	 } 

	$stmt2=$pdo->prepare("SELECT * FROM classroom  WHERE l_username = ? ");
	$stmt2->bindParam(1,$rowUser['l_username']);
	$stmt2->execute();

	$stmt5=$pdo->prepare("SELECT * FROM classroom  WHERE t_username = ? ");
	$stmt5->bindParam(1,$rowUser1['t_username']);
	$stmt5->execute();

	$stmt3=$pdo->prepare("SELECT * FROM teacher WHERE permission = 1");
	$stmt3->execute();

	if (!empty($_SESSION['username']) && $_SESSION['permission'] == 1 || $_SESSION['permission'] == 2) { ?>
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
	<script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js"></script>
	<style type="text/css">
		.zoom{
			width: 170px;
			height: 170px;		
			transition: transform .2s;
		}
		.zoom:hover{
			transform: scale(1.05);
			box-shadow: 0px 0px 20px 10px #1e272e;
		}

		.zoomclass{
			max-width: 700px;
			max-height: 700px;		
			transition: transform .2s;
		}
		.zoomclass:hover{
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
		    <div class="form-inline my-2 my-lg-0 mr-sm-2  col-3">
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
					<strong>Login Success!</strong> สวัสดี คุณ <?php if ($_SESSION['permission']==1) { ?>
						<?=$rowName['l_name'] ?>
					<?php } elseif ($_SESSION['permission'] == 2) { ?>
						<?=$rowName1['t_name'] ?>
					<?php } ?>
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["create_success"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#create_success').alert('fade');
        				setTimeout(function(){
        					$('#create_success').alert('close');
        				}, 3000);
    				});
    				$('#create_success').click(function(){
    					$('create_success').alert('close');
    				});
			</script>
			<div class="alert alert-success alert-dismissible fade show" role="alert" id="create_success">
				<center>
					<strong>Create Class Success !</strong> สร้างคลาส : สำเร็จ
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["create_error"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#create_error').alert('fade');
        				setTimeout(function(){
        					$('#create_error').alert('close');
        				}, 3000);
    				});
    				$('#create_error').click(function(){
    					$('create_error').alert('close');
    				});
			</script>
			<div class="alert alert-danger alert-dismissible fade show" role="alert" id="create_error">
				<center>
					<strong>Create Class Failed !</strong> กรุณาลองใหม่อีกครั้ง
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["create_class_same"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#create_error').alert('fade');
        				setTimeout(function(){
        					$('#create_error').alert('close');
        				}, 3000);
    				});
    				$('#create_error').click(function(){
    					$('create_error').alert('close');
    				});
			</script>
			<div class="alert alert-danger alert-dismissible fade show" role="alert" id="create_error">
				<center>
					<strong>Create Class Failed !</strong> class ซ้ำ กรุณาลองใหม่
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["edit_success"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#edit_success').alert('fade');
        				setTimeout(function(){
        					$('#edit_success').alert('close');
        				}, 3000);
    				});
    				$('#edit_success').click(function(){
    					$('edit_success').alert('close');
    				});
			</script>
			<div class="alert alert-success alert-dismissible fade show" role="alert" id="edit_success">
				<center>
					<strong>Edit Class Success !</strong> 
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["edit_error"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#edit_error').alert('fade');
        				setTimeout(function(){
        					$('#edit_error').alert('close');
        				}, 3000);
    				});
    				$('#edit_error').click(function(){
    					$('edit_error').alert('close');
    				});
			</script>
			<div class="alert alert-danger alert-dismissible fade show" role="alert" id="edit_error">
				<center>
					<strong>Edit Class Failed !</strong> กรุณาลองใหม่อีกครั้ง
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["delete_success"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#delete_success').alert('fade');
        				setTimeout(function(){
        					$('#delete_success').alert('close');
        				}, 3000);
    				});
    				$('#delete_success').click(function(){
    					$('delete_success').alert('close');
    				});
			</script>
			<div class="alert alert-success alert-dismissible fade show" role="alert" id="delete_success">
				<center>
					<strong>Delete Class Success !</strong>
				</center>				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<?php } ?>

	<?php 
		if (!empty($_COOKIE["delete_error"])){ ?>
			<script type="text/javascript">
    			$(window).on('load',function(){
        			$('#delete_error').alert('fade');
        				setTimeout(function(){
        					$('#delete_error').alert('close');
        				}, 3000);
    				});
    				$('#delete_error').click(function(){
    					$('delete_error').alert('close');
    				});
			</script>
			<div class="alert alert-danger alert-dismissible fade show" role="alert" id="delete_error">
				<center>
					<strong>Delete Class Failed !</strong> กรุณาลองใหม่อีกครั้ง
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
			<?php if ($_SESSION['permission'] == 1) { ?>
				<?php while ($row2=$stmt2->fetch()) {?>
				<div class="card-deck my-2 my-lg-0 mr-sm-2 mb-4">
				<div class="card  bg-info zoomclass mb-4">
					<a id="detail_class.php?id=<?=$row2['id']?>" href="detail_class.php?id=<?=$row2['id']?>&c_id=<?=$row2['c_id']?>&c_sec=<?=$row2['c_sec']?>">
						<div class="card-header" style=" margin-top: 5px;">
							<p class="card-text text-white" style="font-size: 20px;"> รหัสวิชา : <?=$row2['c_id']?> </p>
						</div>
						<div class="card-body" style="margin-top: 5px;">
							<div class="from-group mr-sm-2">
								<p class="card-text text-white" style="font-size: 20px;"> ชื่อวิชา : <?=$row2['c_name']?> </p>
							</div>
							<div class="from-group mr-sm-2">
								<p class="card-text text-white" style="font-size: 20px;"> Section : <?=$row2['c_sec']?> </p>
							</div>		
							<div class="from-group mr-sm-2">
							<?php if ($row2['c_term'] == 1) { ?>
								<p class="card-text text-white" style="font-size: 20px;"> ภาคการศึกษา : เทอมต้น </p>
							<?php } elseif ($row2['c_term'] == 2) { ?>
								<p class="card-text text-white" style="font-size: 20px;"> ภาคการศึกษา : เทอมปลาย </p>
							<?php } elseif ($row2['c_term'] == 3) { ?>
								<p class="card-text text-white" style="font-size: 20px;"> ภาคการศึกษา : ภาคฤดูร้อน </p>
							<?php } ?>								
							</div>
							<div class="from-group mr-sm-2">	
								<p class="card-text text-white" style="font-size: 20px;"> ปีการศึกษา : <?=$row2['c_year']?> </p>
							</div>
							<div class="from-group mr-sm-2">
								<p class="card-text text-white" style="font-size: 20px;"> รหัส Join : <?=$row2['c_password']?> </p>	
							</div>									 
						</div>
					</a>
						<div class="card-footer" style="margin-top: 5px;">
							<div class="form-inline" style="text-align: left;">
								<button id="edit_class_button<?=$row2['id']?>" data-target="#edit_class?id=<?=$row2['id']?>" data-toggle="modal" class="btn btn-warning mr-sm-2"><i class="fas fa-edit"></i>&nbsp; แก้ไข </button>
								<button id="delete_class_button<?=$row2['id']?>" data-target="#delete_class?id=<?=$row2['id']?>" data-toggle="modal" class="btn btn-danger mr-sm-2"><i class="fas fa-trash"></i>&nbsp; ลบ </button>
							</div>
						</div>
					
				</div>
			</div>	

			<!-- Modal Edit Class -->
			<form action="edit_class.php" method="post" >
			<div class="modal fade" id="edit_class?id=<?=$row2['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content " style="box-shadow: 0px 0px 50px 25px #1e272e;">
				      <div class="modal-header">
				        <h3 class="modal-title" id="exampleModalLabel">Edit Class</h3>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<input type="hidden" name="id" class="form-control col-12"  value="<?=$row2['id']?>">
					     <div class="form-group mb-4">
					     	<label class="text-primary mb-2"> รหัสวิชา : </label>
					     	<input type="text" name="class_id" id="class_id<?=$row2['id']?>"  class="form-control col-12"  value="<?=$row2['c_id']?>">
					     </div>
					     <div class="form-group mb-4">
					     	<label class="text-primary mb-2"> ชื่อคลาส : </label>
					     	<input type="text" name="class_name" id="class_name<?=$row2['id']?>"  class="form-control col-12"  value="<?=$row2['c_name']?>"> 
					     </div>  
					     <div class="form-group mb-4">
					     	<label class="text-primary mb-2"> ปีการศึกษา : </label>
					     	<input type="text" name="class_year" id="class_year<?=$row2['id']?>"  class="form-control col-12"  value="<?=$row2['c_year']?>">
					     </div>  
					     <div class="form-group mb-4">
					     	<label class="text-primary mb-2"> ภาคการเรียน : </label>
					     	<input type="text" name="class_term" id="class_term<?=$row2['id']?>"  class="form-control col-12"  value="<?=$row2['c_term']?>">
					     </div>  
					     <div class="form-group mb-4">
					     	<label class="text-primary mb-2"> รหัส Join คลาส : </label>
					     	<input type="text" name="class_password" id="class_password<?=$row2['id']?>"  class="form-control col-12" value="<?=$row2['c_password']?>">
					     </div>
					   </div>    	    
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary" id="edit_class_submit<?=$row2['id']?>" name="edit_class_submit<?=$row2['id']?>"> แก้ไขคลาส </button>
				      </div>
				    </div>
				  </div>
				</div>
			</form>

			<!-- Modal delete Class -->
			<form action="delete_class.php" method="post">
			<div class="modal fade" id="delete_class?id=<?=$row2['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content " style="box-shadow: 0px 0px 50px 25px #1e272e;">
				      <div class="modal-header">
				        <h3 class="modal-title" id="exampleModalLabel">Delete Class</h3>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<input type="hidden" name="id" class="form-control col-12" required="" value="<?=$row2['id']?>">
					     <label class="text-dark" style="font-size: 20px;">คุณแน่ใจหรือไม่ ที่จะลบ : </label><br>
					     <label class="text-danger" style="font-size: 20px;"><?=$row2['c_id']?>&nbsp;<?=$row2['c_name']?> </label>
					   </div>    	    
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-danger" id="delete_class_submit<?=$row2['id']?>"> ลบคลาส </button>
				      </div>
				    </div>
				  </div>
				</div>
			</form>

			<?php } ?>	

		<?php } elseif ($_SESSION['permission'] == 2) { ?>
				<?php while ($row5=$stmt5->fetch()) {?>
				<div class="card-deck my-2 my-lg-0 mr-sm-2 mb-4">
				<div class="card  bg-info zoomclass mb-4">
					<a id="detail_class.php?id=<?=$row2['id']?>" href="detail_class.php?id=<?=$row5['id']?>&c_id=<?=$row5['c_id']?>">
						<div class="card-header" style=" margin-top: 5px;">
							<p class="card-text text-white" style="font-size: 20px;"> รหัสวิชา : <?=$row5['c_id']?> </p>
						</div>
						<div class="card-body" style="margin-top: 5px;">
							<div class="from-group mr-sm-2">
								<p class="card-text text-white" style="font-size: 20px;"> ชื่อวิชา : <?=$row5['c_name']?> </p>
							</div>	
							<div class="from-group mr-sm-2">	
								<p class="card-text text-white" style="font-size: 20px;"> ภาคเรียน : <?=$row5['c_term']?> </p>
							</div>
							<div class="from-group mr-sm-2">	
								<p class="card-text text-white" style="font-size: 20px;"> ปีการศึกษา : <?=$row5['c_year']?> </p>
							</div>
							<div class="from-group mr-sm-2">
								<p class="card-text text-white" style="font-size: 20px;"> รหัส Join : <?=$row5['c_password']?> </p>	
							</div>									 
						</div>
					</a>
						<div class="card-footer" style="margin-top: 5px;">
							<div class="form-inline" style="text-align: left;">
								<button id="edit_class_button<?=$row5['id']?>" data-target="#edit_class?id=<?=$row5['id']?>" data-toggle="modal" class="btn btn-warning mr-sm-2"><i class="fas fa-edit"></i>&nbsp; แก้ไข </button>
								<button id="delete_class_button<?=$row5['id']?>" data-target="#delete_class?id=<?=$row5['id']?>" data-toggle="modal" class="btn btn-danger mr-sm-2"><i class="fas fa-trash"></i>&nbsp; ลบ </button>
							</div>
						</div>
					
				</div>
			</div>	

			<!-- Modal Edit Class -->
			<form action="edit_class.php" method="post" >
			<div class="modal fade" id="edit_class?id=<?=$row5['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content " style="box-shadow: 0px 0px 50px 25px #1e272e;">
				      <div class="modal-header">
				        <h3 class="modal-title" id="exampleModalLabel">Edit Class</h3>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<input type="hidden" name="id" class="form-control col-12"  value="<?=$row5['id']?>">
					     <div class="form-group mb-4">
					     	<label class="text-primary mb-2"> รหัสวิชา : </label>
					     	<input type="text" name="class_id" id="class_id"  class="form-control col-12"  value="<?=$row5['c_id']?>">
					     </div>
					     <div class="form-group mb-4">
					     	<label class="text-primary mb-2"> ชื่อคลาส : </label>
					     	<input type="text" name="class_name" id="class_name"  class="form-control col-12"  value="<?=$row5['c_name']?>"> 
					     </div>  
					     <div class="form-group mb-4">
					     	<label class="text-primary mb-2"> ปีการศึกษา : </label>
					     	<input type="text" name="class_year" id="class_year"  class="form-control col-12"  value="<?=$row5['c_year']?>">
					     </div>  
					     <div class="form-group mb-4">
					     	<label class="text-primary mb-2"> ภาคการเรียน : </label>
					     	<input type="text" name="class_term" id="class_term"  class="form-control col-12"  value="<?=$row5['c_term']?>">
					     </div>  
					     <div class="form-group mb-4">
					     	<label class="text-primary mb-2"> รหัส Join คลาส : </label>
					     	<input type="text" name="class_password" id="class_password"  class="form-control col-12" value="<?=$row5['c_password']?>">
					     </div>
					   </div>    	    
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary" id="edit_class_submit" name="edit_class_submit"> แก้ไขคลาส </button>
				      </div>
				    </div>
				  </div>
				</div>
			</form>

			<!-- Modal delete Class -->
			<form action="delete_class.php" method="post">
			<div class="modal fade" id="delete_class?id=<?=$row5['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content " style="box-shadow: 0px 0px 50px 25px #1e272e;">
				      <div class="modal-header">
				        <h3 class="modal-title" id="exampleModalLabel">Delete Class</h3>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<input type="hidden" name="id" class="form-control col-12" required="" value="<?=$row5['id']?>">
					     <label class="text-dark" style="font-size: 20px;">คุณแน่ใจหรือไม่ ที่จะลบ : </label><br>
					     <label class="text-danger" style="font-size: 20px;"><?=$row5['c_id']?>&nbsp;<?=$row5['c_name']?> </label>
					   </div>    	    
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-danger" id="delete_class_submit"> ลบคลาส </button>
				      </div>
				    </div>
				  </div>
				</div>
			</form>
			<?php } ?>
			<?php } ?>

			<div class="card-deck my-2 my-lg-0 mr-sm-2">
				<div class="card bg-light zoom">
					<button id="create_class_button" data-target="#create_class" data-toggle="modal" class="btn btn-light">
						<div class="card-body">
							 <img src="../icon/plus.png" style="width: 100px; height: 115px;"> 
						</div>
					</button>
				</div>
			</div>			
		</div>	
	</div>

	<!-- Modal Create Class -->
	<form action="create_class.php" method="post" name="create_class_form" onSubmit="JavaScript:return fncSubmit();">
	<div class="modal fade" id="create_class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content " style="box-shadow: 0px 0px 50px 25px #1e272e;">
		      <div class="modal-header">
		        <h3 class="modal-title" id="exampleModalLabel">Create Class</h3>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
			     <div class="form-group mb-4">
			     	<label class="text-primary"> รหัสวิชา : </label>
			     	<input type="text" name="c_id" class="form-control" id="c_id" >
			     </div>
			     <div class="form-group mb-4">
			     	<label class="text-primary"> ชื่อรายวิชา : </label>
			     	<input type="text" name="c_name" class="form-control" >
			     </div> 
			     <?php date_default_timezone_set('Asia/Bangkok');
						$date = date('Y'); 
						$dateThai = $date + 542;
				?> 
			     <div class="form-group mb-4">
			     	<label class="text-primary"> ปีการศึกษา : </label>
			     	<select class="form-control" name="c_year">
			     		<?php for ($i=$dateThai; $i <= 3000 ; $i++) { ?>
			     			<option value="<?=$i?>"> <?=$i?> </option>
			     		<?php } ?>
			     	</select>
			     </div>  
			     <div class="form-group mb-4">
			     	<label class="text-primary"> ภาคการศึกษา : </label>
			     	<select class="form-control" name="c_term">
			     		<option value="1"> เทอมต้น </option>
			     		<option value="2"> เทอมปลาย </option>
			     		<option value="3"> ภาคฤดูร้อน </option>
			     	</select>
			     </div>
			      <div class="form-group mb-4">
			     	<label class="text-primary"> Section : </label>
			     	<select class="form-control" name="c_sec">
			     		<?php for ($sec=1; $sec <=200 ; $sec++) { ?>
			     			<option value="<?=$sec?>"> <?=$sec?> </option>
			     		<?php } ?>
			     	</select>
			     </div>
			     <?php if ($_SESSION['permission'] == 2) { ?>
			     	<div class="form-group mb-4">
				     	<label class="text-primary"> อาจารย์ผู้สอน : </label>
				     	<select class="form-control" name="l_username">
				     		<?php while ($row3=$stmt3->fetch()) { ?>
				     			<option value="<?=$row3['l_username']?>"> <?=$row3['l_name']?> </option>
				     		<?php } ?>
				     	</select>
			     	</div>  
			     <?php } ?> 	     
			     <div class="form-group mb-4">
			     	<label class="text-primary"> รหัส Join Class : </label>
			     	<?php $pass = uniqid(); ?>
			     	<input type="text" name="c_password" class="form-control" value="<?=$pass?>">
			     </div>    	
		      </div>		      
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary" id="create_submit" name="create_submit"> สร้างคลาส </button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>

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
