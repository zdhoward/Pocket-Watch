<?php
	include("./Character.php");

	class API {
		var $keyID;
	  var $vCode;

	  var $characters;

		function __construct($keyID, $vCode) {
			echo ("<p>Initializing API</p>");
			if ( $this->sync() ) {

	      $this->keyID = $keyID;
	      $this->vCode = $vCode;

	      $this->URItarget = "https://api.eveonline.com";

				$characters = $this->getCharacters(); //new Character();


				foreach ($characters->row as $character) {
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
