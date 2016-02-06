<?php
  define('__ROOT__', dirname(dirname(__FILE__)));
  require_once(__ROOT__.'/classes/functions.php');
  require_once(__ROOT__.'/config/db.php');
  require_once(__ROOT__.'/classes/Login.php');
  
  $login = new Login();
  if ($login->isUserLoggedIn () == true) {
    $user = $_COOKIE ['user_name'];
    $userID = $_COOKIE ['user_id'];
    $apiKey = $_COOKIE ['api_key'];
  }

  // User browsing
  $userSetName = filter_input(INPUT_GET, 'user');
  if ($userSetName != '') {
    if ($connection->connect_errno) {
      die ( "Connection failed:" );
    }
    $sql = "SELECT user_id from users where user_name='$userSetName'";
    $result = $connection->query ( $sql );
    if (mysqli_fetch_row($connection->query ( $sql )) > 0) {
      while ($row = $result->fetch_assoc ()) {
        $userSetID = $row['user_id'];
      }
      $validUser=1;
    } else {
      $validUser=0;
    }
  }

  // This will get the current URL the user is on
  $current_page = htmlspecialchars(urlencode($_SERVER['REQUEST_URI']));
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="Content-Language" content="en">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/styles.css">
  <link rel="apple-touch-icon-precomposed" href="/assets/pow.png">