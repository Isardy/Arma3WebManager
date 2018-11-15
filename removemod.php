<?php
	session_start();
	if(empty($_SESSION['login'])){
		header('Location: index.php');
		exit();
	}
	require('db.php');
	$modid = $_GET['mod_id'];
	
	$sql = "DELETE FROM mods WHERE id='".$modid."'";
	if (mysqli_query($mysqli, $sql)) {
	    header("Location: index.php?page=server");
		exit();
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
	    mysqli_close($mysqli);
	}
?>