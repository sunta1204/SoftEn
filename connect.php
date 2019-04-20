<?php
	try{
		$pdo = new PDO("mysql:host=localhost;dbname=19S1_g5;
			charset=utf8","root","");
	}catch(PDOException $e){
		echo "เกิดข้อผิดพลาด :".$e->getMessage();
	}
?>