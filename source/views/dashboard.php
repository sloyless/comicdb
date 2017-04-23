<header class="page-header-container row" role="banner">
  <header-image></header-image>
  <div class="page-header-content">
    <div class="col-xs-12">
      <h2 class="text-uppercase">Dashboard</h2>
      <h3>Welcome back, {{userMeta.firstName || 'User'}}</h3>
    </div>
    <div class="meta-block col-xs-12">
      <ul class="list-unstyled font-raleway">
        <li total-comics></li>
        <li total-series></li>
        <li class="meta-followers text-center">
          <user-followers></user-followers>
          <user-following></user-following>
        </li>
      </ul>
    </div>
  </div>
</header>
<section class="row">
  <div class="col-xs-12 col-md-8" carousel-bar role="banner"></div>
  <aside class="col-xs-12 col-md-4" role="complementary ">
    <h3 class="text-uppercase">Recent Activity</h3>
    <user-feed numitems="7"></user-feed>
    <div class="text-right">
      <a class="btn btn-link text-uppercase font-raleway" ng-href="/#/feed">View More <i class="fa fa-chevron-right"></i></a>
    </div>
  </aside>
</section>