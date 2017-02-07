<?php

// THESE ARE NOT FORMATTED CORRECTLY, THIS IS LOGIC AND PLANNING ONLY

class User {

	public function __construct() {
		//TODO Load keyID from db
		//TODO Load vCode from db
	}

	// This should be outside of User object, but having a couple objects of this Type
	private class API = {
		private $keyID = '';
		private $vCode = '';
		private Character $chars[2];

		private function updateInfo(); // needs to return true if successful

		public function __get() {
			if ( updateInfo() ) {
				return $this;
			} else {
				die('Update Failed');
			}
		}

	}

	private class Character[] = {

	}

	public function updateInfo() {
		try {
			// TODO populate User's Character
		} catch (Exception $e) {
			return false;
		}

		return true;
	}
}

?>
