<?php 
include "include/db.php";
$id=$_GET['id'];

$sql="DELETE FROM items WHERE id=:item_id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':item_id',$id);
$stmt->execute();
if ($stmt->rowCount()) {
		header("location:items.php");
	}else{
		echo "Error";
	}


 ?>