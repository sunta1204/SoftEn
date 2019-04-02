<?php
	
function deleteFile($file_path){
	$myFile = $file_path;
	if(unlink($myFile)){
		return true;
	}else{
		return false;
	}
}
?>