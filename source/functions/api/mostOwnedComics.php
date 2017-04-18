<?php
  require_once('../config/db.php');
  $sql = "SELECT comics.comic_id, users_comics.comic_id, count(users_comics.comic_id) c, issue_number, series_vol, series_name, cover_image
    FROM users_comics
    LEFT JOIN comics
    ON users_comics.comic_id=comics.comic_id
    LEFT JOIN series
    ON comics.series_id=series.series_id
    GROUP BY users_comics.comic_id
    ORDER BY c DESC
    LIMIT 8";

  $result = $mysqli->query ( $sql ) or die($mysqli->error.__LINE__);
  $arr = array();
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $arr[] = $row;
    }
    echo $json_response = json_encode($arr);
  }
?>