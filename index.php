<?php
include('RandData.php');
include('rand-data-controller.php');

?>

<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="utf-8"/>
<title></title>
</head>

<body>

<form id="myform" action ="" method="post">

<p>
<input type="submit" name="goData" value="Générer les données"/>
</p>

</form>
<?php 
if(isset($msg_success)){
	?><div><?php echo $msg_success; ?></div>
	<button>Visualiser les données</button><?php
} 
?>


</body>

</html>