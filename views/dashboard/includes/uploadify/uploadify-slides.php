<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/



// Define a destination
if(isset($_POST['product_id'])) {
$targetFolder = '/uploads/products/slideshows/'.$_POST['product_id'].'/'; // Relative to the root

	$verifyToken = md5('unique_salt' . $_POST['timestamp']);
		
	if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
		$tempFile = $_FILES['Filedata']['tmp_name'];
		$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
		$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
		
		// Validate the file type
		$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
		$fileParts = pathinfo($_FILES['Filedata']['name']);
		
		if (in_array($fileParts['extension'],$fileTypes)) {
			move_uploaded_file($tempFile,$targetFile);
			echo $_FILES['Filedata']['name'];
		} else {
			echo 'Invalid file type.';
		}
	}
}
?>