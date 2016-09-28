      <?php include('modules/notifications/notifications.php'); ?>
    </main>
    <footer class="main-footer col-xs-12 text-center center-block">
      <p>&copy;<?php echo date("Y"); ?> Anthony Sanchez and Sean Loyless.</p>
    </footer>
  </div>
  <!-- Site content ends -->
  <?php if ($login->isUserLoggedIn () != true) { ?>
    <?php include('modules/login/login_modal.php'); ?>
  <?php } else { ?>
    <?php include('modules/login/logout_modal.php'); ?>
  <?php } ?>  
</div>
<!-- Site wrapper ends -->

<!-- Scripts at the bottom to improve load time -->
<script src="/scripts/vendor/angular.js"></script>
<script src="/scripts/vendor/angular-resource.min.js"></script>
<script src="/scripts/vendor/angular-cookies.min.js"></script>
<script src="/scripts/vendor/angular-sanitize.min.js"></script>
<script src="/scripts/vendor/angular-route.min.js"></script>
<script src="/scripts/vendor/angular-animate.min.js"></script>
<script src="/scripts/vendor/angular-md5.min.js"></script>
<script src="/scripts/vendor/ui-bootstrap-tpls-2.1.4.min.js"></script>

<script src="/scripts/app.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73612000-1', 'auto');
  ga('send', 'pageview');

</script>