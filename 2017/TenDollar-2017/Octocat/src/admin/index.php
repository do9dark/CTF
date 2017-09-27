<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<style type="text/css">
		body {
			background-color: #FFFFFF;
			background-image: url("../images/admin.gif");
			text-align: center;
			vertical-align: middle;
		}
	</style>
</head>
<body>
	<?php
		error_reporting(0);
		include("config.php");
		
		if(isset($_GET['hack'])) {
			if(preg_match("/_|\.|0|9|=|\"|\'|\`|#|-|@|\(|\)|[a-z]/", $_GET['hack'])) exit("<h1>No Hack</h1>");
			
			$query = mysql_query("SELECT * FROM user WHERE no=$_GET[hack]") or die("<h1>No Hack</h1>");
			$data = mysql_fetch_array($query);

			# mysql> select * from CTF.user;
			# +-------+-------+
			# | no    | name  |
			# +-------+-------+
			# | 31337 | guest |
			# | pwned | admin |
			# +-------+-------+
			# 2 rows in set (0.00 sec)

			if($data[1] == "guest") echo("<h1>Access Denied</h1>");
			else if($data[1] == "admin") echo("<h1>Flag is TDCTF{{$flag}}</h1>");
			else echo("<img src='../images/hack.png'>");
		}
	?>
</body>
</html>
