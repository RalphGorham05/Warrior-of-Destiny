<?php
	$db = new mysqli('localhost', 'root', '', 'game_db');

	if ($db->connect_error) 
	{
		die('Connect Error (' . $db->connect_errno . ') '. $db->connect_error);
	}
?>