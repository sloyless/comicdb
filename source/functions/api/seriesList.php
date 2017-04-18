<?php
  require_once('../config/db.php');
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

        // Start pagination
        $pageNum = filter_input(INPUT_GET, 'page');
        if (!isset($pageNum)) {
          $pageNum = 1;
        }
        $hasPagination = false;
        // Prepare our string array
        $pagination = '';
        $sql = "SELECT *, CASE WHEN series_name
          LIKE 'The %' THEN trim(substr(series_name from 4)) else series_name end as series_name2
          FROM series WHERE $idList
          ORDER BY series_name2 ASC, series_vol ASC ";
        if ($numResults > 48) {
          // Lock our results at 48 per page (to make even rows)
          $hasPagination = true;
          $sql .= 'LIMIT 48 ';
        }
        $result = $mysqli->query ( $sql ) or die($mysqli->error.__LINE__);
        while($row = $result->fetch_assoc()) {
          $arr[] = $row;
        }

        echo $json_response = json_encode($arr);
      }
    } elseif ($type == 'publisher') {
      $sql = "SELECT DISTINCT comics.series_id
          FROM comics
          LEFT JOIN users_comics
          ON comics.comic_id=users_comics.comic_id
          LEFT JOIN series
          ON comics.series_id=series.series_id
          WHERE users_comics.user_id=$user_id AND series.publisherID=$publisherSearchId
          ORDER BY series_id;";
    } else {
      $sql = "SELECT * , CASE WHEN series_name
        LIKE 'The %' THEN trim(substr(series_name from 4)) else series_name end as series_name2
        FROM series ORDER BY series_name2 ASC, series_vol ASC";
    }
  }
  // $result = $mysqli->query ( $sql ) or die($mysqli->error.__LINE__);
  // $arr = array();
  // if ($result->num_rows > 0) {
  //   // Meta Key and Meta Value can be set as anything. We need to set an array to store all the values for the user.
  //   while($row = $result->fetch_assoc()) {
  //     $arr[] = $row;
  //   }

  //   echo $json_response = json_encode($arr);
  // }

  //   // List all books/publishers
  //   if ($listAll == 1) {
  //     $sql = "SELECT * , CASE WHEN series_name
  //       LIKE 'The %' THEN trim(substr(series_name from 4)) else series_name end as series_name2
  //       FROM series ORDER BY series_name2 ASC, series_vol ASC";
  //     $this->series_list_result = $this->db_connection->query ( $sql );
  //   // List all owned books by publisher
  //   } elseif ($listAll == 2) {
  //     $sql = "SELECT DISTINCT comics.series_id
  //         FROM comics
  //         LEFT JOIN users_comics
  //         ON comics.comic_id=users_comics.comic_id
  //         LEFT JOIN series
  //         ON comics.series_id=series.series_id
  //         WHERE users_comics.user_id=$user_id AND series.publisherID=$publisherSearchId
  //         ORDER BY series_id;";
  //     $result = $this->db_connection->query ( $sql );
  //     if (mysqli_fetch_row($this->db_connection->query ( $sql )) > 0) {
  //       $list = NULL;
  //       while ($row = $result->fetch_assoc ()) {
  //         $list .= "series_id=" . $row ['series_id'] . " or ";
  //       }
  //       $idList = preg_replace('/(or(?!.*or))/', '', $list);
  //       $sql = "SELECT *, CASE WHEN series_name
  //         LIKE 'The %' THEN trim(substr(series_name from 4)) else series_name end as series_name2
  //         FROM series WHERE $idList
  //         ORDER BY series_name2 ASC, series_vol ASC";
  //       $this->series_list_result = $this->db_connection->query ( $sql ); 
  //     }
  //   } else {
  //     // List all owned books in a series
  //     $sql = "SELECT DISTINCT comics.series_id
  //         FROM comics
  //         JOIN users_comics
  //         ON comics.comic_id=users_comics.comic_id
  //         WHERE users_comics.user_id=$user_id ORDER BY series_id;";

  //     $result = $this->db_connection->query ( $sql );
  //     $numResults = $result->num_rows;
  //     if (mysqli_fetch_row($this->db_connection->query ( $sql )) > 0) {
        
          
  //       }
  //       $this->series_list_result = $this->db_connection->query ( $sql ); 
  //     }
  //   }
  // }
?>