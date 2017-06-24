<?php 

	function db_connect(){
		$dbHost = 'localhost';
		$dbUsername = 'root';
		$dbPassword = '';
		$dbName = 'bill';
		$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
		return $db;
	}

	function execute_query($sql, $conn){
		return $conn->query($sql);
	}