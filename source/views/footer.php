      <?php include(__ROOT__.'/modules/notifications/notifications.php'); ?>
    </main>
    <footer class="main-footer col-xs-12 text-center center-block">
      <ul>
        <li><a href="/">Dashboard</a></li>
        <li><a href="/profile.php">Collection</a></li>
        <li><a href="/feed.php">User Feed</a></li>
        <li><a href="/settings.php">Settings</a></li>
        <li><a data-toggle="modal" data-target="#logoutFormModal">Logout</a></li>
      </ul>
      <p>&copy;<?php echo date("Y"); ?> Anthony Sanchez and Sean Loyless.</p>
    </footer>
  </div>
  <!-- Site content ends -->
  <?php if ($login->isUserLoggedIn () != true) { ?>
    <?php include(__ROOT__.'/modules/login/login_modal.php'); ?>
  <?php } else { ?>
    <?php include(__ROOT__.'/modules/login/logout_modal.php'); ?>
  <?php } ?>
</div>
<!-- Site wrapper ends -->

<!-- Scripts at the bottom to improve load time -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="/scripts/app.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73612000-1', 'auto');
  ga('send', 'pageview');

</script>
