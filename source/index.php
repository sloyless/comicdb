<?php
  define('__ROOT__', dirname(dirname(__FILE__).'/build'));
  require_once(__ROOT__.'/views/includes.php');
  require_once(__ROOT__.'/views/head.php');
?>
  <title>POW! Comic Book Manager</title>
</head>
<body>
  <?php
  // If users is logged in, shows a random comic from their collection. Otherwise just shows a random comic.
  if ($login->isUserLoggedIn () == true) {
    include 'views/header.php';
    include 'modules/user_bar/user_bar.php';
    echo '<main ng-view></main>';
  } else {
    include 'views/splash.php';
  }
  ?>
<?php include 'views/footer.php';?>
</body>
</html>