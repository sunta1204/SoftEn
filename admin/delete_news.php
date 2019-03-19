<?php 
	session_start();
	include '../connect.php';

	$id = $_POST['classroom_id'];
	$c_id = $_POST['c_id'];

	$stmt=$pdo->prepare("DELETE FROM news WHERE id = ?");
	$stmt->bindParam(1,$_POST['id']);

?>

<body>
	<?php if ($stmt->execute()) { 
		setcookie('delete_news_success',1,time()+5,'/'); ?>
		<script type="text/javascript"> window.location.href="detail_class.php?id=<?=$id?>&c_id=<?=$c_id?>"; </script>
	<?php } else {
		setcookie('delete_news_error',1,time()+5,'/');?>
		<script type="text/javascript"> window.location.href="detail_class.php?id=<?=$id?>&c_id=<?=$c_id?>" </script>
	<?php } ?>
</body>