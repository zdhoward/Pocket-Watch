<?php

// THESE ARE NOT FORMATTED CORRECTLY, THIS IS LOGIC AND PLANNING ONLY

class User {
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
