<?php
class API {
	var $keyID;
  var $vCode;

  var $characters;

	function __construct() {
		if ( $this->sync() ) {
      // TODO Load API info from secure method
      $this->keyID = "5971947";
      $this->vCode = "XmjJCTU6qinGmWHPQyJd3uYQb9ONGBUna2H5wtT94JdKXldgrlwQXEnwm2jfaWdC";

      $this->URItarget = "https://api.eveonline.com";

      // TODO Load Characters from API an sync them

			// Sync Successful
      echo ("Success");
		} else {
      echo ("Failed");
    }
	}

	function sync() {
    echo ("Synchronizing...");

    $xml = $this->request();

    //$this->status = $xml->result->serverOpen;

    //$this->playerCount = $xml->result->onlinePlayers;

    //debugDump ($xml->result);

		return true;
	}

  function request() {
    $xml = "";

    $URItarget = "https://api.eveonline.com";

    $xml = simplexml_load_file("$URItarget/server/ServerStatus.xml.aspx");

    return $xml;
  }
};
?>
