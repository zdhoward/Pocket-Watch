<?php
class Character {

  // TODO STILL DOESN'T LOAD
	var $URItarget = "https://api.eveonline.com";

	var $keyID;             // LOADED
	var $vCode;             // LOADED

	var $ID;                // LOADED
	var $name;              // LOADED
	var $avatar;            // LOADED

	var $corpID;            // LOADED
	var $corpName;          // LOADED
	var $corpLogo;          // LOADED

	var $allianceID;        // LOADED
	var $allianceName;      // LOADED
	var $allianceLogo;      // LOADED

	var $factionID;         // LOADED
	var $factionName;       // LOADED
	var $factionLogo;       // UNTESTED

	var $skillQueue;        // LOADED

	var $characterSheet;    // LOADED

	var $watchList;         // SKIPPED

	var $standings;         // LOADED

	var $notifications;     // LOADED

	var $accountBalance;    // LOADED
	var $walletJournal;     // LOADED
	var $walletTransactions;// LOADED

	var $assets;            // LOADED

	var $calendarEvents;    // LOADED

	var $contracts;         // LOADED
	var $auctions;          // LOADED

	var $industryJobs;      // LOADED

	var $research;          // LOADED

	var $mailHeaders;       // LOADED

	var $marketOrders;      // LOADED

	// CONSTRUCT
	function __construct($keyID, $vCode, $character) {
		//debugDump($character);
		echo ("<p>Initializing Character</p>");

		//LOAD Character
		// API Key
		$this->keyID = $keyID;
		$this->vCode = $vCode;

		// Character
		$this->ID = $character['characterID'];
		$this->name = $character['name'];
		$this->avatar = "<img alt='$this->name' src=http://image.eveonline.com" . "/Character/" . $character['characterID'] . "_128.jpg>";

		// Corp
		$this->corpID = $character['corporationID'];
		$this->corpName = $character['corporationName'];
		$this->corpLogo = "<img alt='$this->corpName' src=http://image.eveonline.com" . "/Corporation/" . $character['corporationID'] . "_128.png>";

		// Alliance
		$this->allianceID = $character['allianceID'];
		$this->allianceName = $character['allianceName'];
		$this->allianceLogo = "<img alt='$this->allianceName' src=http://image.eveonline.com" . "/Alliance/" . $character['allianceID'] . "_128.png>";

		// Faction
		$this->factionID = $character['factionID'];
		$this->factionName = $character['factionName'];
		$this->factionLogo = "<img alt='$this->factionName' src=http://image.eveonline.com" . "/Faction/" . $character['factionID'] . "_128.png>";

		if ( $this->sync() ) {

      // TODO Load Characters from API an sync them

			// Sync Successful
			//debugDump($this);
      echo ("<p>$this->name Initialized</p>");
		} else {
      echo ("<p>Character Initialization Failed<p>");
    }
	}

	// SYNC
	function sync() {
		echo ("<p>Synchronizing...</p>");

		$this->skillQueue = $this->getSkillQueue();

		$this->characterSheet = $this->getCharacterSheet();

		$this->standings = $this->getStandings();

		$this->notifications = $this->getNotifications();

		$this->accountBalance = $this->getAccountBalance();
		$this->walletJournal = $this->getWalletJournal();
		$this->walletTransactions = $this->getWalletTransactions();

		$this->assets = $this->getAssets();

		$this->calendarEvents = $this->getCalendarEvents();

		$this->contracts = $this->getContracts();
		$this->auctions = $this->getAuctions();

		$this->industryJobs = $this->getIndustryJobs();

		$this->research = $this->getResearch();

		$this->mailHeaders = $this->getMailHeaders();

		$this->marketOrders = $this->getMarketOrders();

		$this->contacts = $this->getContacts();

		$this->watchList = $this->getWatchList();

		return true;
	}

	/////
	// API ACCESSORS
	//////////

	function getSkillQueue() {

		$xml = simplexml_load_file("$this->URItarget/char/SkillQueue.xml.aspx?keyID=$this->keyID&vCode=$this->vCode&characterID=$this->ID");

		$skillQueue = $xml->result->rowset;

		return $skillQueue;
	}

	function getCharacterSheet() {

		$xml = simplexml_load_file("$this->URItarget/char/CharacterSheet.xml.aspx?keyID=$this->keyID&vCode=$this->vCode&characterID=$this->ID");

		$characterSheet = $xml->result;

		return $characterSheet;
	}

	function getStandings() {

		$xml = simplexml_load_file("$this->URItarget/char/Standings.xml.aspx?keyID=$this->keyID&vCode=$this->vCode&characterID=$this->ID");

		$standings = $xml->result->characterNPCStandings->rowset;

		return $standings;
	}

	function getNotifications() {

		$xml = simplexml_load_file("$this->URItarget/char/Notifications.xml.aspx?keyID=$this->keyID&vCode=$this->vCode&characterID=$this->ID");

		$notifications = $xml->result->rowset;

		return $notifications;
	}

	function getAccountBalance() {

		$xml = simplexml_load_file("$this->URItarget/char/AccountBalance.xml.aspx?keyID=$this->keyID&vCode=$this->vCode&characterID=$this->ID");

		$balance = $xml->result->rowset->row['balance'];

		return $balance;
	}

	function getWalletJournal() {

		$xml = simplexml_load_file("$this->URItarget/char/WalletJournal.xml.aspx?keyID=$this->keyID&vCode=$this->vCode&characterID=$this->ID");

		$journal = $xml->result->rowset;

		return $journal;
	}

	function getWalletTransactions() {

		$xml = simplexml_load_file("$this->URItarget/char/WalletTransactions.xml.aspx?keyID=$this->keyID&vCode=$this->vCode&characterID=$this->ID");

		$tx = $xml->result->rowset;

		return $tx;
	}

	function getAssets() {

		$xml = simplexml_load_file("$this->URItarget/char/AssetList.xml.aspx?keyID=$this->keyID&vCode=$this->vCode&characterID=$this->ID");

		$assets = $xml->result->rowset;

		return $assets;
	}

	function getCalendarEvents() {

		$xml = simplexml_load_file("$this->URItarget/char/UpcomingCalendarEvents.xml.aspx?keyID=$this->keyID&vCode=$this->vCode&characterID=$this->ID");

		$events = $xml->result->rowset;

		return $events;
	}

	function getContracts() {

		$xml = simplexml_load_file("$this->URItarget/char/Contracts.xml.aspx?keyID=$this->keyID&vCode=$this->vCode&characterID=$this->ID");

		$contracts = $xml->result->rowset;

		return $contracts;
	}

	function getAuctions() {

		$xml = simplexml_load_file("$this->URItarget/char/ContractBids.xml.aspx?keyID=$this->keyID&vCode=$this->vCode&characterID=$this->ID");

		$auctions = $xml->result->rowset;

		return $auctions;
	}

	function getIndustryJobs() {

		$xml = simplexml_load_file("$this->URItarget/char/IndustryJobs.xml.aspx?keyID=$this->keyID&vCode=$this->vCode&characterID=$this->ID");

		$jobs = $xml->result->rowset;

		return $jobs;
	}

	function getResearch() {

		$xml = simplexml_load_file("$this->URItarget/char/Research.xml.aspx?keyID=$this->keyID&vCode=$this->vCode&characterID=$this->ID");

		$research = $xml->result;

		return $research;
	}

	function getMailHeaders() {

		$xml = simplexml_load_file("$this->URItarget/char/MailMessages.xml.aspx?keyID=$this->keyID&vCode=$this->vCode&characterID=$this->ID");

		$mail = $xml->result->rowset;

		return $mail;
	}

	function getMarketOrders() {

		$xml = simplexml_load_file("$this->URItarget/char/MarketOrders.xml.aspx?keyID=$this->keyID&vCode=$this->vCode&characterID=$this->ID");

		$orders = $xml->result->rowset;

		return $orders;
	}

	function getContacts() {
		$xml = simplexml_load_file("$this->URItarget/char/ContactList.xml.aspx?keyID=$this->keyID&vCode=$this->vCode&characterID=$this->ID");

		$contacts = $xml->result->rowset;

		return $contacts;
	}

	function getWatchList() {
		$contacts = $this->getContacts();

		$buddies = array();

		foreach ($contacts->row as $contact) {
			if ($contact['inWatchlist'] == 'True') {
				array_push($buddies, $contact);
			}
		}

		return $buddies;
	}
};
?>
