<?php
  require_once('../config/db.php');

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
    WHERE users_comics.user_id AND users_meta.meta_key='first_name' ORDER BY users_comics.id DESC LIMIT 50";
  $result = $mysqli->query ( $sql ) or die($mysqli->error.__LINE__);
  $arr = array();
  if ($result->num_rows > 0) {
    // Meta Key and Meta Value can be set as anything. We need to set an array to store all the values for the user.
    while($row = $result->fetch_assoc()) {
      $arr[] = $row;
    }
  }
  // if ($result->num_rows > 0) {
  //   // Meta Key and Meta Value can be set as anything. We need to set an array to store all the values for the user.
  //   $this->meta_key = array();
  //   $this->meta_val = array();

  //   while ($row = $result->fetch_assoc()) {
  //     array_push($this->meta_key, $row ['meta_key']);
  //     array_push($this->meta_val, $row ['meta_value']);
  //     $chunks = array(
  //       array(60 * 60 * 24 * 365 , 'year'),
  //       array(60 * 60 * 24 * 30 , 'month'),
  //       array(60 * 60 * 24 * 7, 'week'),
  //       array(60 * 60 * 24 , 'day'),
  //       array(60 * 60 , 'hour'),
  //       array(60 , 'minute'),
  //     );
  //     $timeAdded = DateTime::createFromFormat('Y-m-d H:i:s', $row['date_added'])->format('U');
  //     $timeNow = time(); // Current unix time
  //     $since = $timeNow - $timeAdded;
  //     if($since > 604800) {
  //       $print = date("M jS", $timeAdded);

  //       if($since > 31536000) {
  //         $print .= ", " . date("Y", $timeAdded);
  //       }
  //     }

  //     // $j saves performing the count function each time around the loop
  //     for ($i = 0, $j = count($chunks); $i < $j; $i++) {
  //       $seconds = $chunks[$i][0];
  //       $name = $chunks[$i][1];
  //       // finding the biggest chunk (if the chunk fits, break)
  //       if (($count = floor($since / $seconds)) != 0) {
  //         break;
  //       }
  //     }

  //     $print = ($count == 1) ? '1 '.$name : "$count {$name}s";

  //     $added = $print . " ago ";

  //     // offset 1 for 0 array position
  //     $array_size = sizeof($this->meta_key) -1;
  //     // Loops through the meta_key array for values, then gets their associated key and assigns it to a global var.
  //     for ($i = 0; $i <= $array_size; $i++) {
  //       if ($this->meta_key[$i] === 'first_name') {
  //          $this->user_first_name = $this->meta_val[$i];
  //       }
  //       if ($this->meta_key[$i] === 'avatar') {
  //          $this->user_avatar = $this->meta_val[$i];
  //       }
  //     }
  //     $gravatar_hash = $userEmailHash = md5( strtolower( trim( $row['user_email'] )));
  //     $avatar = '//www.gravatar.com/avatar/' . $gravatar_hash . '?s=200&d=' . urlencode('http://comicmanager.com/assets/avatar-deadpool.png');

  //     $feed .= '<li><span class="profile-avatar pull-left"><img src="' . $avatar . '" alt="" class="img-responsive img-circle" /></span>' . $this->user_first_name . ' added <a href="comic.php?comic_id=' . $row['comic_id'] . '">' . $row['series_name'] . ' (' . $row['series_vol'] . ') #' . $row['issue_number'] . '</a> - <em>' . $added . '</em></li>';
  //   }
  //   $this->feed = $feed;
  echo $json_response = json_encode($arr);
?>