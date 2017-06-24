<?php 
include_once '../model/db.php';
$conn = db_connect();
$sql = "DELETE FROM `item_details` WHERE id='".$_GET['id']."'";
if(execute_query($sql, $conn)){
	header('location: ../view/add_item.php?status=deleted_success');
}else{
	header('location: ../view/add_item.php?status=error');
}