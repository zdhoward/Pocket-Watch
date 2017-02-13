<?php
include_once("../assets/.credentials");
include_once("assets/.credentials");
session_start();
$session_key = session_id();

//debugDump($credentials);

$connection = new mysqli("localhost", $credentials['dbUser'], $credentials['dbPass'], "pocketwatch");

$query = $connection->prepare("SELECT `session_id`, `user_id` FROM `tbl_sessions` WHERE `session_key` = ? AND `session_address` = ? AND `session_useragent` = ? AND `session_expires` > NOW();");
//debugDump($connection);
$query->bind_param("sss", $session_key, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']);
$query->execute();
$query->bind_result($session_id, $user_id);
$query->fetch();
$query->close();

if(empty($session_id)) {
	header('Location: account/login.php');
}

$query = $connection->prepare("UPDATE `tbl_sessions` SET `session_expires` = DATE_ADD(NOW(),INTERVAL 1 HOUR) WHERE `session_id` = ?;");
$query->bind_param("i", $session_id );
$query->execute();
$query->close();
?>
