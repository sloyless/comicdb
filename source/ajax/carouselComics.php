<?php
  require_once('../config/db.php');
  $user_id = $_COOKIE ['user_id'];
  $sql = "SELECT comics.comic_id, users_comics.comic_id, cover_image, issue_number, plot, series.publisherID, publishers.publisherID, publisherShort, comics.series_id, series.series_id, series_name, series_vol, story_name, users_comics.user_id
      FROM comics
      LEFT JOIN users_comics
      ON comics.comic_id=users_comics.comic_id
      LEFT JOIN series
      ON comics.series_id=series.series_id
      LEFT join publishers
      on series.publisherID=publishers.publisherID
      WHERE users_comics.user_id=$user_id 
      ORDER BY RAND()
      LIMIT 5";
  $result = $mysqli->query ( $sql ) or die($mysqli->error.__LINE__);
  $arr = array();
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $arr[] = $row;
    }
    echo $json_response = json_encode($arr);
  }
?>