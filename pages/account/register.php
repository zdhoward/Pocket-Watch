<?php
  include_once("../assets/.credentials");

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

    if ($result->num_rows == 0) {
      $result->free();

      $sql = "INSERT INTO `tbl_account` (username, password) VALUES ('" . $_POST['username'] . "', '" . password_hash($_POST['password'], PASSWORD_DEFAULT) . "')";

      if(!$result = $db->query($sql)){
        die('There was an error running the query [' . $db->error . ']');
      }

      echo ($_POST['username'] . " has now been added as a new user");

      header("Location: login.php");
      die();

    } else {
      echo ("This user already exists");
    }

    $result->free();
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
      <td><input type="submit" value="Register"></td>
    </tr>
  </table>
</form>
