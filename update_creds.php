<?php
	session_start();
	if(empty($_SESSION['login'])){
		header('Location: index.php');
		exit();
	}
	require('db.php');
	$username = $_POST['username'];
	$password = $_POST['password'];	

	$sql = "SELECT COUNT(*) FROM steam_creds";

	$credscount = mysqli_fetch_row(mysqli_query($mysqli, $sql));

	if ($credscount[0] == 0){
		$sql = "INSERT INTO steam_creds VALUES ('".$username."', '".$password."')";
	}
	else{
		$sql = "UPDATE steam_creds SET username='".$username."', password='".$password."'";
	}
	if (mysqli_query($mysqli, $sql)) {
	    header("Location: index.php?page=server");
		exit();
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
	    mysqli_close($mysqli);
	}
?>