<?php
  require_once('../config/db.php');
  $user_id = $_COOKIE ['user_id'];
  $sql = "SELECT user_id, comics.comic_id, users_comics.comic_id, series_id
      FROM comics
      JOIN users_comics
      ON comics.comic_id=users_comics.comic_id
      WHERE users_comics.user_id=$user_id
      GROUP BY series_id";

  $seriesCount = mysqli_num_rows($mysqli->query ( $sql ));
  echo $json_response = json_encode($seriesCount);
?>