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

    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      if (password_verify($_POST['password'], $row['password'])) {
        echo ("Logged In!");
        header("Location: ../index.php");
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
