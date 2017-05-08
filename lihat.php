<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php

	require "konek.php";

	$hasil= $conn->query("select * from files order by nama asc");

	while ($row = $hasil->fetch_array()) {
		echo "<a href='$row[folder]'>".$row[1]."</a></br>";
		
	}
?>
</body>
</html>