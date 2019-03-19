<?php 
	session_start();
	include '../connect.php';

	date_default_timezone_set('Asia/Bangkok');
	$date = date('d/m/Y-h:i:sa');

	$id = $_POST['id'];
	$c_id = $_POST['c_id'];

	$stmt=$pdo->prepare("UPDATE news SET n_title = ? , n_description = ? , n_date = ?  WHERE id = ? ");
	$stmt->bindParam(1,$_POST['n_title']);
	$stmt->bindParam(2,$_POST['n_description']);
	$stmt->bindParam(3,$_POST['n_date']);
	$stmt->bindParam(4,$_POST['id']);

?>
<body>
	<?php if ($stmt->execute()) {
		setcookie('edit_news_success',1,time()+5,'/'); ?>
		<script type="text/javascript"> window.location.href="detail_class.php?id=<?=$id?>&c_id=<?=$c_id?>";</script>
	<?php } else{
		setcookie('edit_news_error',1,time()+5,'/'); ?>
		<script type="text/javascript"> window.location.href="detail_class.php?id=<?=$id?>&c_id=<?=$c_id?>";</script>
	<?php } ?>
</body>