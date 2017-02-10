<?php
	include("./Character.php");

	class API {
		var $keyID;
	  var $vCode;

	  var $characters;

		function __construct() {
			echo ("<p>Initializing API</p>");
			if ( $this->sync() ) {
	      // TODO Load API info from secure method
	      $this->keyID = "5971947";
	      $this->vCode = "XmjJCTU6qinGmWHPQyJd3uYQb9ONGBUna2H5wtT94JdKXldgrlwQXEnwm2jfaWdC";

	      $this->URItarget = "https://api.eveonline.com";

	      // TODO Load Characters from API an sync them
				$characters = $this->getCharacters(); //new Character();

				//debugDump($characters);

				foreach ($characters->row as $character) {
					//debugDump($character);
					$temp = new Character($this->keyID, $this->vCode, $character);
					array_push($this->characters, $temp);
				}

				// Sync Successful
	      echo ("<p>API Initialized</p>");
			} else {
	      echo ("<p>API Initialization Failed</p>");
	    }
		}

		// FUNCTIONS

		function getCharacters() {

			//$URItarget = "https://api.eveonline.com";

			$xml = simplexml_load_file("$this->URItarget/account/Characters.xml.aspx?keyID=$this->keyID&vCode=$this->vCode");

			$characters = $xml->result->rowset;

			return $characters;
		}

		// SYNC + REQUEST

		function sync() {
	    echo ("<p>Synchronizing...</p>");

	    $xml = $this->request();

	    //$this->status = $xml->result->serverOpen;

	    //$this->playerCount = $xml->result->onlinePlayers;

	    //debugDump ($xml->result);

			return true;
		}

	  function request() {
	    $xml = "";

	    //$URItarget = "https://api.eveonline.com";

	    $xml = simplexml_load_file("$this->URItarget/server/ServerStatus.xml.aspx");

	    return $xml;
	  }
	};
?>
