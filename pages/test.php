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
  //$user = new User("obdo");
  //debugDump($user);
  //$_SESSION['user'] = json_encode($user);
  //echo($serialize);

  //$unserialize = json_decode($_SESSION['user']);
  //debugDump($unserialize);
  //echo ($_SESSION['username']);
  //session_unset();

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
