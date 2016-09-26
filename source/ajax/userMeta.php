<?php 
  require_once('../config/db.php');
  $user_id = $_COOKIE ['user_id'];
  $sql = "SELECT *
      FROM users_meta
      LEFT JOIN users
      ON users.user_id=users_meta.user_id
      WHERE users_meta.user_id = $user_id";

  $result = $mysqli->query ( $sql ) or die($mysqli->error.__LINE__);
  $arr = array();
  if ($result->num_rows > 0) {
    // Meta Key and Meta Value can be set as anything. We need to set an array to store all the values for the user.
    while($row = $result->fetch_assoc()) {
      $arr[] = $row;
    }

    echo $json_response = json_encode($arr);
  }
?>