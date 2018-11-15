<?php
	session_start();
	if(empty($_SESSION['login'])){
		header('Location: index.php');
		exit();
	}
	require('db.php');
	$steamcmd = $_POST['steamcmd'];
	$arma = $_POST['arma'];	
	$mods = $_POST['mods'];

	$sql = "SELECT COUNT(*) FROM paths";

	$pathscount = mysqli_fetch_row(mysqli_query($mysqli, $sql));

	if ($pathscount[0] == 0){
		$sql = "INSERT INTO paths VALUES ('".$steamcmd."', '".$arma."', '".$mods."')";
	}
	else{
		$sql = "UPDATE paths SET steamcmd='".$steamcmd."', arma='".$arma."', mods='".$mods."'";
	}
	if (mysqli_query($mysqli, $sql)) {
	    header("Location: index.php?page=server");
		exit();
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
	    mysqli_close($mysqli);
	}
?>