<?php
	session_start();
	if(empty($_SESSION['login'])){
		header('Location: index.php');
		exit();
	}
	require('db.php');
	$modid = $_POST['mod_id'];
	
	$command = "./scripts/getModInfo.py " . $modid;
	$output = shell_exec(escapeshellcmd($command));
	$modinfo = explode(',', $output);

	$id = $modinfo[0];
	$title = $modinfo[1];
	$update = $modinfo[2];

	$values = "'".$id."', '".$title."', '".trim($update)."', '".trim($update)."'";

	$sql = "INSERT INTO mods VALUES (" . $values . ")";
	if (mysqli_query($mysqli, $sql)) {
	    header("Location: index.php?page=server");
		exit();
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
	    mysqli_close($mysqli);
	}
?>