<?php
	session_start();
	if(empty($_SESSION['login'])){
		header('Location: index.php');
		exit();
	}
	require('db.php');
	$modid = $_POST['mod_id'];
	/*header('Location: index.php?page=server');*/
	/*$command = "./scripts/getModInfo.py " . $modid;
	echo $command;
	$output = shell_exec(escapeshellcmd($command));
	echo $output;*/
	echo shell_exec("./scripts/getModInfo.py sdsd sdsd");
?>