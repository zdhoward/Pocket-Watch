<?php
  Server {
    public static checkStatus();
  }
  
  User {
    private API[] {
      private Characters[] {
        private Wallet {
        }
        private Assets {
        }
      }
    }

    // API FUNCTIONS
    refreshAPI($api)

    // API CRUD
    addAPI($api)
    removeAPI($api)
    updateAPI($api)

    // CHAR FUNCTIONS
    refreshCharacter($charID)

    // CHAR CRUD
    addCharacter($charID)
    removeCharacter($charID)

    // CHAR ACCESSORS
    getNameByID()
    getAvatarByID()

    getCorpID()
    getCorpNameByID()
    getCorpAvatarByID()

    getAllianceID()
    getAllianceNameByID()
    getAllianceAvatarByID()

    getFactionID()
    getFactionName()
    getFactionAvatarByID()

    getSkillQueue()

    getFWStats()

    getCharacterSheet()

    getBuddies()

    getStandings()

    getNotifications()

    // WALLET FUNCTIONS
    updateWallet()

    // ASSETS FUNCTIONS
    updateAssets()

    // CALENDAR FUNCTIONS
    updateCalendar()

    // CONTRACT FUNCTIONS
    updateContracts()

    // INDUSTRY FUNCTIONS
    updateIndustry()

    // MAIL FUNCTIONS
    getMail()
    getMailingList()

    sendMail()

    // MARKET FUNCTIONS
    updateMarketOrders()


  }

?>
