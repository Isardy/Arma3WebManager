<!doctype html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Arma 3 Web Manager</title>
		<meta name="description" content="A web manager for modded Arma 3 Dedicated servers.">
		<meta name="author" content="Isardy">
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
		<header class="index_header">
			<h1>Arma 3 Web Manager</h1>
		</header>
		<section>
			<?php
				if (isset($_GET['page']))
				{
					$page = $_GET['page'];
					switch($page)
					{
						case 'login':
							include('login.php');
							break;
						case 'auth':
							include('auth.php');
							break;
						case 'server':
							include('server.php');
							break;
					}
				}
				else
				{
					include('login.php');
				}
			?>
		</section>
	</body>
</html>