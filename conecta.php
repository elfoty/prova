<?php
	$hostname="localhost";
	$username="root";
	$password="";
	$dbname="prova";
	$link = mysqli_connect($hostname,$username, $password) or die ("html>script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)/script>/html>");
	
	//mysqli_select_db($link,$dbname) or die (mysql_error());
	/*$query = "SELECT nome FROM mes"; 
	$result_query = mysqli_query($link, $query ) or die(' Erro na query:' . $query . ' ' . mysql_error() );
	
	while ($row = mysqli_fetch_array( $result_query )) 
	{ 
		echo $row["nome"]; 
		echo "<br>";
	}*/

?>