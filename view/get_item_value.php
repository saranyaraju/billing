<?php 
	include_once '../model/db.php';
	$db = db_connect();
	$item_name = $_GET['item_name'];
	$query = $db->query("SELECT `unit_price` FROM item_details WHERE item_name = '".$item_name."'");
	while ($row = $query->fetch_assoc()) {
	    $data = $row['unit_price'];
	}
	echo $data;