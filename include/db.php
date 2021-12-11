<?php 

$dbhost="localhost";
$dbuser="root";
$dbname="info_channel";
$dbpwd="";

$con="mysql:host=$dbhost;dbname=$dbname";
$pdo=new PDO($con,$dbuser,$dbpwd);
try{
	$conn=$pdo;
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOEXception $e){
	echo "Connection fail" .$e->getMessage();

}


 ?>