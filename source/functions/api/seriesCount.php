<?php
  require_once('../../config/db.php');
  if(isset($_GET['user'])){
    // Lookup user id from username
    $user = $_GET['user'];
    $sql = "SELECT user_id, user_email
        FROM users
        WHERE user_name = '$user'";
    $result = $mysqli->query ( $sql ) or die($mysqli->error.__LINE__);
    if ($result->num_rows > 0) {
      while ( $row = $result->fetch_assoc () ) {
        $user_id = $row ['user_id'];
      }
    }
  } else {
    $user_id = $_COOKIE ['user_id'];
  }
  $sql = "SELECT user_id, comics.comic_id, users_comics.comic_id, series_id
      FROM comics
      JOIN users_comics
      ON comics.comic_id=users_comics.comic_id
      WHERE users_comics.user_id=$user_id
      GROUP BY series_id";

  $seriesCount = mysqli_num_rows($mysqli->query ( $sql ));
  echo $json_response = json_encode($seriesCount);
?>