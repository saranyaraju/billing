<?php 
include_once '../model/db.php';
$conn = db_connect();
print_r($_POST);


$sql = "UPDATE `item_details` SET`item_name`='".$_POST['item_name']."',`unit_price`='".$_POST['unit_price']."',`quantity`='".$_POST['qty']."',`alert_at`='".$_POST['alert_at']."' WHERE id='".$_POST['id']."'";
if(execute_query($sql, $conn)){
	header('location: ../view/add_item.php?status=update_success');
}else{
	header('location: ../view/add_item.php?status=error');
}