<?php
	include_once '../model/db.php';
	$db = db_connect();
	$searchTerm = $_GET['term'];
	$query = $db->query("SELECT * FROM item_details WHERE item_name LIKE '%".$searchTerm."%' ORDER BY item_name ASC");
	while ($row = $query->fetch_assoc()) {
	    $data[] = $row['item_name'];
	}
	echo json_encode($data);