<header class="page-header-container row" role="banner">
  <header-image></header-image>
  <div class="page-header-content">
    <div class="col-xs-12">
      <h2 class="text-uppercase">Dashboard</h2>
      <h3>Welcome back, {{userMeta.firstName || 'User'}}</h3>
    </div>
    <div class="meta-block col-xs-12">
      <ul class="list-unstyled font-raleway">
        <li><total-comics></total-comics></li>
        <li><total-series></total-series></li>
        <li class="meta-followers text-center">
          <user-followers></user-followers>
          <user-following></user-following>
        </li>
      </ul>
    </div>
  </div>
</header>
<section class="row" role="main">
  <div class="col-xs-12 col-md-8"><carousel-bar></carousel-bar></div>
  <div class="col-xs-12 col-md-4"><user-feed></user-feed></div>
</section>