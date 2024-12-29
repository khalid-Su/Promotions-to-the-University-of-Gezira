<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM contributions WHERE id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>