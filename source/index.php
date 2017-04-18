<?php
  require_once('config/db.php');
  require_once('functions/Login.php');
  require_once('functions/functions.php');
  require_once('functions/userFunctions.php');

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
<!DOCTYPE html>
<html lang="en" dir="ltr" ng-app="app" ng-cloak>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Language" content="en">
  <title ng-bind="$root.title + ' :: POW! Comic Book Manager'">POW! Comic Book Manager</title>
  <base href="/">
  <link rel="stylesheet" href="/styles.css">
  <link rel="apple-touch-icon-precomposed" href="/assets/images/logo.png">
  <meta name="description" content="POW! Comic Book Manager is your best place to organize and display your comic book collection!">
  <link rel="index" href="http://comicmanager.com/" title="POW! Comic Book Manager">
  <link rel="canonical" href="http://comicmanager.com/">
  <meta name="url" content="http://comicmanager.com/">
  <meta name="identifier-URL" content="http://comicmanager.com/">
  <meta name="rating" content="General" />
  <meta name="revisit-after" content="7 days" />

  <!-- iOS-->
  <meta name="apple-mobile-web-app-title" content="POW! Comic Book Manager">

  <!-- Facebook Opengraph -->
  <meta property="og:site_name" content="POW! Comic Book Manager" />
  <meta property="og:url" content="http://comicmanager.com"/>
  <meta property="og:title" content="POW! Comic Book Manager" />
  <meta property="og:description" content="POW! Comic Book Manager is your best place to organize and display your comic book collection!" />
  <meta property="og:image" content="http://comicmanager.com/assets/images/logo.png" />
  <meta property="og:type" content="website" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@xebix" />
  <meta name="twitter:creator" content="@xebix" />
  <meta name="twitter:title" content="POW! Comic Book Manager" />
  <meta name="twitter:description" content="POW! Comic Book Manager is your best place to organize and display your comic book collection!" />
  <meta name="twitter:image" content="http://comicmanager.com/assets/svg/logo.svg" />
</head>
<body>
  <?php
  if ($login->isUserLoggedIn () == true) {
    include 'views/header.php';
    echo '<main ng-view class="container-fluid"></main>';
  } else {
    include 'views/splash.php';
  }
  ?>
<?php include 'views/footer.php';?>
</body>
</html>