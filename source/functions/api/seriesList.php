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

  if(isset($_GET['itemsperpage'])){
    $itemsperpage = $_GET['itemsperpage'];
  } else {
    $itemsperpage = "24";
  }

  if (isset($_GET['type'])) {
    $type = $_GET['type'];
    if ($type == 'series') {
      $sql = "SELECT DISTINCT comics.series_id
          FROM comics
          JOIN users_comics
          ON comics.comic_id=users_comics.comic_id
          WHERE users_comics.user_id=$user_id ORDER BY series_id;";

      $result = $mysqli->query ( $sql ) or die($mysqli->error.__LINE__);
      $numResults = $result->num_rows;
      if ($result->num_rows > 0) {
        $list = NULL;
        while ($row = $result->fetch_assoc ()) {
          $list .= "series_id=" . $row ['series_id'] . " or ";
        }
        $idList = preg_replace('/(or(?!.*or))/', '', $list);

        // Prepare our string array
        $sql = "SELECT *, CASE WHEN series_name
          LIKE 'The %' THEN trim(substr(series_name from 4)) else series_name end as series_name2
          FROM series WHERE $idList
          ORDER BY series_name2 ASC, series_vol ASC ";
        if ($numResults > $itemsperpage) {
          $sql .= "LIMIT $itemsperpage ";
        }
        if(isset($_GET['offset'])){
          $offset = $_GET['offset'];
          $sql .= "OFFSET $offset";
        }
        $result = $mysqli->query ( $sql ) or die($mysqli->error.__LINE__);
        while($row = $result->fetch_assoc()) {
          $arr[] = $row;
        }

        echo $json_response = json_encode($arr);
      }
    } else {
      $sql = "SELECT * , CASE WHEN series_name
        LIKE 'The %' THEN trim(substr(series_name from 4)) else series_name end as series_name2
        FROM series ORDER BY series_name2 ASC, series_vol ASC";
    }
  }
?>