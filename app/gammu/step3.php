<?php include "menu2.php"; ?>

<h2>Langkah 3 - Install Database</h2>

<?php
  if (@$_POST['submit']) 
  {
    $dbname = $_POST['db'];
	$dbuser = $_POST['username'];
	$dbpass = $_POST['password'];
	
	mysql_connect("localhost", $dbuser, $dbpass);
	$query = "DROP DATABASE IF EXISTS ".$dbname;
	$result = mysql_query($query);
	$query = "CREATE DATABASE ".$dbname;
	$result = mysql_query($query);
	
	if (!$result) {
    die('<b>Error: </b>' . mysql_error());
    }

    $handle = @fopen("app/gammu/mysql-table.sql", "r");
	$content = fread($handle, filesize("app/gammu/mysql-table.sql"));
	$split = explode(";", $content);
	
	mysql_select_db($dbname);
	
	for ($i=0; $i<=count($split)-1; $i++)
	{
	  mysql_query($split[$i]);
    }

	fclose($handle);
	echo "<p>Database <b>\"".$dbname."\"</b> sudah berhasil dibuat</p>";
  }
?> 

<p>Masukkan konfigurasi koneksi MySQL!</p>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<table>
 <tr><td>USERNAME</td><td>:</td><td><input type="text" name="username"></td></tr>
 <tr><td>PASSWORD</td><td>:</td><td><input type="password" name="password"></td></tr>
 <tr><td>NAMA DATABASE YG AKAN DIBUAT UNTUK GAMMU</td><td>:</td><td><input type="text" name="db" value="esms"></td></tr>
 <tr><td></td><td></td><td><input type="submit" name="submit" value="INSTALL"></td></tr>
</table>

</form>