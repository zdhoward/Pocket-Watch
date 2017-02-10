<?php
class User {

	var $mainCharacterID;
	var $accessMask; // Check if you can query something before you do it
	var $APIs;

	function __construct() {
		//TODO Load keyID from db
		//TODO Load vCode from db
		$this->keyID = "5971947";
		$this->vCode = "XmjJCTU6qinGmWHPQyJd3uYQb9ONGBUna2H5wtT94JdKXldgrlwQXEnwm2jfaWdC";

		$api = new API($this->keyID, $this->vCode);

    echo ("User Initialized");
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
};
?>
