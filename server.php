<?php
	require('db.php');
	$sql_steam_username = "SELECT username, password FROM steam_creds";
	$sql_paths = "SELECT steamcmd, arma, mods FROM paths";
	$sql_mods = "SELECT * FROM mods";

	if ($steam_username = mysqli_query($mysqli, $sql_steam_username)){
		while ($obj = mysqli_fetch_object($steam_username)){
			$steam_username = $obj->username;
			$steam_password = $obj->password;		
		}
	}
	mysqli_free_result($steam_username);
	if ($list_paths = mysqli_query($mysqli, $sql_paths)){
		while ($obj = mysqli_fetch_object($list_paths)){
			$steamcmd_path = $obj->steamcmd;
			$arma_path = $obj->arma;
			$mods_path = $obj->mods;		
		}
	}
	mysqli_free_result($list_paths);
?>

<div class="creds cf">
	<form name="creds_form" action="update_creds.php" method="post" accept-charset="utf-8">
		<h2>Steam Credentials</h2>
		<ul>
			<li>
				<label for="username">Username</label>
				<input type="text" name="username" placeholder="Username" value="<?php echo $steam_username;?>" required>
			</li>
			<li>
				<label for="password">Password</label>
				<input type="password" name="password" placeholder="Password" value="<?php echo $steam_password;?>" required>
			</li>
			<li>
				<input class="submit" type="submit" value="Update">
			</li>
		</ul>
	</form>
</div>
<div class="paths cf">
	<form name="paths_form" action="update_paths.php" method="post" accept-charset="utf-8">
		<h2>Paths</h2>
		<ul>
			<li>
				<label for="username">steamcmd</label>
				<input type="text" name="steamcmd" placeholder="/path/to/steamcmd" value="<?php echo $steamcmd_path;?>" required>
			</li>
			<li>
				<label for="arma">arma3server</label>
				<input type="text" name="arma" placeholder="/path/to/arma3server" value="<?php echo $arma_path;?>" required>
			</li>
			<li>
				<label for="arma">mods</label>
				<input type="text" name="mods" placeholder="/path/to/mods" value="<?php echo $mods_path;?>" required>
			</li>
			<li>Paths to steamcmd and arma3server must be absolute. Path to mods directory is relative from arma3server.</li>
			<li>
				<input class="submit" type="submit" value="Update">
			</li>
		</ul>
	</form>
</div>
<div class="mods cf">
	<h2>Mods</h2>
	<table>
		<tr>
			<th>Workshop id</th>
			<th>Title</th>
			<th>Last update</th>
			<th>Latest update</th>
			<th class="actions">Actions</th>
		</tr>

		<?php
			if ($list_mods = mysqli_query($mysqli, $sql_mods)){
				while ($obj = mysqli_fetch_object($list_mods)){

					echo "<tr>";
					echo "<td>".$obj->id."</td>";
					echo "<td>".$obj->title."</td>";
					echo "<td>".$obj->last_update."</td>";
					echo "<td";
					if (!($obj->last_update == $obj->latest_update)){
						echo " bgcolor=red";
					}
					echo ">".$obj->latest_update."</td>";
					echo "<td><a href=\"#\" class=\"action_buttons\">Update</a><a href=\"#\" class=\"action_buttons\">Remove</a>";
					echo "</tr>";
				}
			}
			mysqli_free_result($list_paths);
		?>
		<form name="mods_form" action="add_mod.php" method="post" accept-charset="utf-8">
			<td><input type="text" name="add_id" placeholder="Workshop ID"></td>
			<td></td>
			<td></td>
			<td></td>
			<td><input type="submit" class="add_mod_button" value="Add"></td>
		</form>
	</table>
</div>