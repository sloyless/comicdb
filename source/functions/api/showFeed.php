<?php
  require_once('../../config/db.php');
  if(isset($_GET['numitems'])){
    // Set number of items returned by query string from front-end
    $numItems = $_GET['numitems'];
  } else {
    $numItems = 50;
  }

  $sql = "SELECT users.user_name, users.user_email, series.series_name, series.series_vol, comics.issue_number, comics.cover_image, users_comics.date_added, comics.comic_id, users_meta.meta_key, users_meta.meta_value
    FROM comics
    LEFT JOIN users_comics
    ON comics.comic_id=users_comics.comic_id
    LEFT JOIN series
    ON comics.series_id=series.series_id
    LEFT JOIN users
    on users.user_id=users_comics.user_id
    LEFT JOIN users_meta
    ON users_meta.user_id=users_comics.user_id
    WHERE users_comics.user_id AND users_meta.meta_key='first_name' ORDER BY users_comics.id DESC LIMIT $numItems";
  $result = $mysqli->query ( $sql ) or die($mysqli->error.__LINE__);
  $arr = array();
  if ($result->num_rows > 0) {
    // Meta Key and Meta Value can be set as anything. We need to set an array to store all the values for the user.
    while($row = $result->fetch_assoc()) {
      $arr[] = $row;
    }
  }
  echo $json_response = json_encode($arr);
?>