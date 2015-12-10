<?php
if (isset($_POST['goData'])){
	
	$newData = new RandData();
	
	$result = $newData->randNumberPupils();
	
	if($result === true){
		$msg_success = 'Données générées et enregistrées';
	}
}