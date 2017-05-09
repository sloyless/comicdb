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

  if(isset($_GET['series'])){
    $series_id = $_GET['series'];
  } else {
    return false;
  }

  $sql = "SELECT *
        FROM comics
        LEFT JOIN users_comics
        ON comics.comic_id=users_comics.comic_id
        WHERE comics.series_id=$series_id AND users_comics.user_id=$user_id";

  // Issue count
  $seriesIssueCount = mysqli_num_rows($mysqli->query ( $sql ));
  echo $json_response = json_encode($seriesIssueCount);
?>