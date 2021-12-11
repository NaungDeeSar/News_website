<?php 
include "include/db.php";
$id=$_GET['id'];

$sql="DELETE FROM category WHERE id=:cat_id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':cat_id',$id);
$stmt->execute();
if ($stmt->rowCount()) {
		header("location:category.php");
	}else{
		echo "Error";
	}


 ?>