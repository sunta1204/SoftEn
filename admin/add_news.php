<?php 
	session_start();
	include '../connect.php';

	date_default_timezone_set('Asia/Bangkok');
	$date = date('d/m/Y-h:i:sa');

	$id = $_POST['classroom_id'];
	$c_id = $_POST['c_id'];

	$stmt=$pdo->prepare("INSERT INTO news (n_title , n_description , n_date , l_username , l_name , c_id) VALUES (?,?,?,?,?,?)");
	$stmt->bindParam(1,$_POST['n_title']);
	$stmt->bindParam(2,$_POST['n_description']);
	$stmt->bindParam(3,$date);
	$stmt->bindParam(4,$_POST['l_username']);
	$stmt->bindParam(5,$_POST['l_name']);
	$stmt->bindParam(6,$c_id);

?>

<body>
	<?php if ($stmt->execute()) {
		setcookie('add_news_success',1,time()+5,'/'); ?>
		<script type="text/javascript"> window.location.href='detail_class.php?id=<?=$id?>&c_id=<?=$c_id?>'; </script>
	<?php } else {
		setcookie('add_news_error',1,time()+5,'/');?>
		<script type="text/javascript"> window.location.href='detail_class.php?id=<?=$id?>&c_id=<?=$c_id?>'; </script>
	<?php } ?>
</body>