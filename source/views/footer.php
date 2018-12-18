<footer class="main-footer col-xs-12 text-center hidden-xs hidden-sm" ng-controller="rootController">
  <nav class="navbar navbar-default navbar-footer hidden-xs hidden-sm font-raleway" role="navigation">
    <ul class="nav navbar-nav text-uppercase">
      <li ng-class="{active: $route.current.activetab == 'dashboard'}"><a href="/#/">Dashboard</a></li>
      <li ng-class="{active: $route.current.activetab == 'profile'}"><a ng-href="/#/profile/{{userMeta.userName}}">Collection</a></li>
      <li ng-class="{active: $route.current.activetab == 'feed'}"><a href="/#/feed">User Feed</a></li>
      <li ng-class="{active: $route.current.activetab == 'settings'}"><a href="/#/settings">Settings</a></li>
      <li ng-class="{active: $route.current.activetab == 'about'}"><a href="/#/about">About</a></li>
      <li><a href="https://github.com/asanchez78/comicdb/issues" target="_blank">Bugs</a></li>
      <li><a ng-click="logout()">Logout</a></li>
    </ul>
  </nav>
  <p>Site design and development &copy;<?php echo date("Y"); ?> Anthony Sanchez and <a href="http://seanloyless.info/" target="_blank">Sean Loyless.</a><br />
  All comic content &copy; their publishers.</p>
</footer>

<!-- Scripts at the bottom to improve load time -->
<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
<script src="https://unpkg.com/vue/dist/vue.js"></script>

<script src="/scripts/vendor/angular.js"></script>
<script src="/scripts/vendor/angular-resource.js"></script>
<script src="/scripts/vendor/angular-cookies.js"></script>
<script src="/scripts/vendor/angular-sanitize.js"></script>
<script src="/scripts/vendor/angular-route.js"></script>
<script src="/scripts/vendor/angular-animate.js"></script>
<script src="/scripts/vendor/angular-md5.js"></script>
<script src="/scripts/vendor/ui-bootstrap-tpls.js"></script>

<script src="/scripts/app.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73612000-1', 'auto');
  ga('send', 'pageview');

</script>