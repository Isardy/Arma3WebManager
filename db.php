<?php
	$DB_server = 'localhost';
	$DB_user = 'isardy';
	$DB_password = 'w*s^ju9mSOZjW!C5Xb';
	$DB_db = 'arma';

	$mysqli = new mysqli($DB_server, $DB_user, $DB_password, $DB_db);	
	
	if ($mysqli->connect_errno)
	{
	    echo "Database error : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
?>