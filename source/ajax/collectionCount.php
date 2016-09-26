<?php
  require_once('../config/db.php');
  $user_id = $_COOKIE ['user_id'];
  $sql = "SELECT SUM(quantity) AS totalComics from users_comics where users_comics.user_id = $user_id";

  $result = $mysqli->query ( $sql ) or die($mysqli->error.__LINE__);
  $totalCount = '';
  if ($result->num_rows > 0) {
    // Meta Key and Meta Value can be set as anything. We need to set an array to store all the values for the user.
    $row = $result->fetch_row ();
    $totalCount = (int)$row [0];

    echo $json_response = json_encode($totalCount);
  }
?>