<?php 
	include_once '../model/db.php';
	$conn = db_connect();
	$sql = "INSERT INTO `item_details`( `item_name`, `unit_price`, `quantity`, `alert_at`) VALUES ('".$_POST['item_name']."','".$_POST['unit_price']."','".$_POST['qty']."','".$_POST['alert_at']."')";
	if($conn->query($sql)){
		header("Location:../view/add_item.php?status=insert_success");
	}else{
		header("Location:../view/add_item.php?status=error");
	}

