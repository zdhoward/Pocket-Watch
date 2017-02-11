<?php
  include("library.php");
  include("classes/Server.php");
  include("classes/User.php");
  include("classes/API.php");
  include("classes/Character.php");
  //$player = refreshAPI();

  // SERVER TESTING

  /*
  echo ("<p>--------- SERVER ---------</p>");

  $server = new Server();
  echo ("<p>Status: $server->status</p>");
  echo ("<p>Players: $server->playerCount</p>");

  echo ("<p>----- SERVER END ------</p>");
  */



  echo ("<p>---------- USER ----------</p>");

  // new User($username, $hashedPassword)
  $user = new User();

  echo ("<p>------- USER END -------</p>");


  /*
  echo ("<p>---------- API ----------</p>");

  $api = new API();

  echo ("<p>------- API END ------</p>");
  */

  /*
  echo ("<p>------ CHARACTER ------</p>");

  $character = new Character();

  echo ("<p>--- CHARACTER END ---</p>");
  */
?>
