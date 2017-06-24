<?php
	include_once '../model/db.php';
	$db = db_connect();
	$searchTerm = $_GET['term'];
	$sql = "SELECT * FROM customers WHERE phone_number LIKE '%".$searchTerm."%' ORDER BY phone_number ASC";
	$query = $db->query($sql);
	while ($row = $query->fetch_assoc()) {
	    $data[] = $row['phone_number'];
	}
	echo json_encode($data);