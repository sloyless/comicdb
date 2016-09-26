<?php
  require_once(__ROOT__.'/config/db.php');
  require_once(__ROOT__.'/classes/Login.php');
  require_once(__ROOT__.'/classes/functions.php');
  require_once(__ROOT__.'/classes/userFunctions.php');
  
  $login = new Login();
  if ($login->isUserLoggedIn () == true) {
    $userName = $_COOKIE ['user_name'];
    $userID = $_COOKIE ['user_id'];
    $apiKey = $_COOKIE ['apiKey'];
    $userEmail = $_COOKIE ['user_email'];
  }
  if (isset($_COOKIE['apiKey']) && isset($_COOKIE['user_id']) && isset($_COOKIE['user_name']) && isset($_COOKIE['user_email'])) {
    define('__apiKey__', $_COOKIE['apiKey']);
    define('__userID__', $_COOKIE['user_id']);
    define('__userName__', $_COOKIE['user_name']);
    define('__userEmail__', $_COOKIE['user_email']);
  }
  // This will get the current URL the user is on
  $current_page = htmlspecialchars(urlencode($_SERVER['REQUEST_URI']));
?>