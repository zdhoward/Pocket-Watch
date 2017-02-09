<?php
class Character = {

  // TODO STILL DOESN'T LOAD

	var $ID;
	var $name;
	var $avatar;

	var $corpID;
	var $corpName;
	var $corpLogo

	var $allianceID;
	var $allianceName;
	var $allianceLogo;

	var $factionID;
	var $factionName;
	var $factionLogo;

	var $skillQueue;

	var $FWStats;

	var $characterSheet;

	var $buddies;

	var $standings;

	var $notifications;

	var $accountBalance;
	var $walletJournal;
	var $walletTransactions;

  // $assets['system'][];
	var $assets;

	var $calendarEvents;

	var $contracts;

	var $industryJobs;

	var $researchJobs;

	var $mail;

	var $marketOrders;

	// CONSTRUCT
	function __construct($id) {
		//if ( sync() ) {
			// Sync Successful
		//}
	}

	// SYNC
	function sync() {
		//return true;
	}

  // REQUEST
  function request() {
    //$args = func_get_args();
    //$argNum = func_num_args();
    //for ($i = 0; $i < $argNum; $i++) {
      // Parse args

    //}

  }
};
?>
