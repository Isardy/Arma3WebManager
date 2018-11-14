<?php
	require('db.php');
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE user='".$mysqli->real_escape_string($username)."'";
    //username check
    $query_1 = $mysqli->query($sql);

    if(mysqli_num_rows($query_1)==0)
    {
    	echo 'Invalid username.';
    	echo '<a href="index.php" temp_href="index.php">Try again.</a>';
        exit();
    }
    else
    {
    	//login + password check
    	 $query_2 = $mysqli->query($sql." AND password='".$mysqli->real_escape_string($password)."'");

		if(mysqli_num_rows($query_2)==0)
		{
			echo 'Invalid username and/or password.<br/>';
            echo '<a href="index.php" href="index.php">Try Again</a>';
            exit();
		}
		else
		{
            session_start();
            $_SESSION['login'] = $username;
			header('Location: index.php?page=server');
		}   	
    } 
 ?>