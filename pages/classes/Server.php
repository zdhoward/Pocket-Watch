<?php
class Server {
	var $status;
  var $playerCount;

	function __construct() {
		if ( $this->sync() ) {
			// Sync Successful
      echo ("Success");
		} else {
      echo ("Failed");
    }
	}

	function sync() {
    echo ("<p>Synchronizing...</p>");

    $xml = $this->request();

    $this->status = $xml->result->serverOpen;

    $this->playerCount = $xml->result->onlinePlayers;

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
