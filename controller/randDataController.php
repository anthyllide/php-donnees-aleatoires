<?php
if (isset($_POST['goData'])){
	
	$newData = new RandData();
	
	$result = $newData->persist();
	
	if($result === false){
		$msg_error = 'Un problème est survenu';
	}
}