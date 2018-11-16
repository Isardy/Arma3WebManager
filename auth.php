<?php
	require('db.php');
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE user='".$username."'";

    if ($result = mysqli_query($mysqli, $sql)){
        $row = mysqli_fetch_assoc($result);
        if ( $username==$row['user'] && password_verify($password, $row['password'])){
            session_start();
            $_SESSION['login'] = $username;
            header('Location: index.php?page=server');
        }
        else{
            echo "Invalid username and/or password. <a href=\"index.php\">Try again</a>";
        }
    }
    else{
        echo "SQL error. Contact admin or try again.";
    }
?>
