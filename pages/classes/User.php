<?php
include_once("../assets/.credentials");
include_once("assets/.credentials");

class User {

	var $mainCharacterID;
	//var $accessMask; // Check if you can query something before you do it
	var $APIs = array();

	function __construct($username) {
		$db = new mysqli('localhost', "root", "root", 'pocketwatch');

    if($db->connect_errno > 0){
      die('Unable to connect to database [' . $db->connect_error . ']');
    }

    $sql = "SELECT * FROM `tbl_api` WHERE `username` = '" . $username . "'";

    if(!$result = $db->query($sql)){
      die('There was an error running the query [' . $db->error . ']');
    }

		for ($i = 0; $i < $result->num_rows; $i++) {
      $row = $result->fetch_assoc();
			$api = new API($row['keyID'], $row['vCode']);
			array_push($this->APIs, $api);
			//debugDump($row);
		}
		//TODO Login User to secure db and retrieve API info
		//TODO Load keyID from db
		//TODO Load vCode from db
		//$this->keyID = ;
		//$this->vCode = ;

		//$api = new API("5971947", "XmjJCTU6qinGmWHPQyJd3uYQb9ONGBUna2H5wtT94JdKXldgrlwQXEnwm2jfaWdC");
		//array_push($this->APIs, $api);

		//$api = new API("5988042", "Ri5XU6Ig5OW1g0nP2OgblBSrybdQJ2LImXqj1I55TjNOKNp5TWEyXTr5YyDva3It");
		//array_push($this->APIs, $api);

		//debugDump($APIs);

    //echo ("User Initialized");
	}

	// This should be outside of User object, but having a couple objects of this Type

	function updateInfo() {
		try {
			// TODO populate User's Characters, one-by-one
		} catch (Exception $e) {
			return false;
		}

		return true;
	}

	function getAPIs() {

	}
};
?>
