<?php

// THESE ARE NOT FORMATTED CORRECTLY, THIS IS LOGIC AND PLANNING ONLY

class User {
	
	public function __construct() {
		//TODO Load keyID from db
		//TODO Load vCode from db
	}
	
	private class API[] = {
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

class oldUser {
  API[] {
    keyID
    vCode

    updateInfo()
  }

  Character[] {

    Info {
      ID
      name
      avatar

      corpID
      corpName
      corpLogo

      allianceID
      allianceName
      allianceLogo

      factionID
      factionName
      factionLogo

      skillQueue[]

      FWStats[]

      standings[]
      buddies[]

      notifications[]

      Wallet {
        accountBalance

        walletJournal[]
        walletTransactions[]

        getAccountBalance()
        getJournal()
        getTransactions()
      }

      Assets {
        items[]

        getAssets()
        getAssetsForSystem()
      }

      Calendar {
        events[]

        getEvents();
      }

      Contract {
        contracts[]

        getContracts()
        getBiddingContracts()
      }

      Industry {
        jobsManufacture[]
        jobsResearch[]

        getManufacturingJobs()
        getResearchJobs()
      }

      Mail {
        mails[]
        mailingLists[]

        getMail()
        getMailingList()
        sendMail()
      }

      Market {
        buyOrders[]
        sellOrders[]
        watchedItems[]

        getMarketOrders()
        getWatchedItems()
      }
    }

    getRecentNotifications()
    getFWStats()
    getCharacter()
    getBuddies()
    getStandings()

  }

  class Server {
    status

    checkStatus()
  }
}

?>
