<?php
  include_once("../assets/.credentials");
  include_once("assets/.credentials");
  include_once("../classes/User.php");

  function debugDump($array) {
    printf("print_r():<pre>%s</pre>", print_r($array, TRUE));
  }

  if ($_POST) {

    $db = new mysqli('localhost', $credentials['dbUser'], $credentials['dbPass'], 'pocketwatch');

    if($db->connect_errno > 0){
      die('Unable to connect to database [' . $db->connect_error . ']');
    }


    $sql = "SELECT * FROM `tbl_account` WHERE `username` = '" . $_POST['username'] . "'";

    if(!$result = $db->query($sql)){
      die('There was an error running the query [' . $db->error . ']');
    }

    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      if (password_verify($_POST['password'], $row['password'])) {
        //echo ("Logged In!");

        // LOAD INFORMATION FROM DB

        // LOAD USER OBJECT INTO SESSOION DATA
        //session_start();
        //$_SESSION['username'] = $_POST['username'];
        //$_SESSION['user'] = new User($_POST['username']);

        //header("Location: ../index.php");
        //die();

        session_start();
  			$session_key = session_id();
        $username = $_POST['username'];
        $server_address = $_SERVER['REMOTE_ADDR'];
        $http_agent = $_SERVER['HTTP_USER_AGENT'];

        //$_SESSION = new User($username);

        //$connection = new mysqli("localhost", $credentials['dbUser'], $credentials['dbPass'], "pocketwatch");

        //debugDump($connection);

  			//$query = $connection->prepare("INSERT INTO `tbl_sessions` ( `user_id`, `session_key`, `session_address`, `session_useragent`, `session_expires`) VALUES ( ?, ?, ?, ?, DATE_ADD(NOW(),INTERVAL 1 HOUR) );");
  			//$query->bind_param("isss", $userid, $session_key, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'] );

        //debugDump($query);

  			//$query->execute();
  			//$query->close();

        $sql = "INSERT INTO `tbl_sessions` ( `user_id`, `session_key`, `session_address`, `session_useragent`, `session_expires`) VALUES ( '$username', '$session_key', '$server_address', '$http_agent', DATE_ADD(NOW(),INTERVAL 1 HOUR) );";

        if(!$result = $db->query($sql)){
          die('There was an error running the query [' . $db->error . ']');
        }

        //debugDump($sql);

  			header('Location: ../index.php');
        die();
      } else {
        echo ("This user/password combination is incorrect");
      }
      $result->free();

    } else {
      echo ("This user/password combination is incorrect");
    }
  }

?>
<form method="post" action="">
  <table>
    <tr>
      <td>Username:</td>
    </tr>
    <tr>
      <td><input type="text" name="username" value=<?php echo('"' . $_POST['username'] . '"'); ?>></td>
    </tr>
    <tr>
      <td>Password:</td>
    </tr>
    <tr>
      <td><input type="password" name="password"></td>
    </tr>
    <tr>
      <td><input type="submit" value="Login"></td>
    </tr>
  </table>
</form>
