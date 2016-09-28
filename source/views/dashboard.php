<spinner></spinner>
<section class="dashboard-index" ng-controller="userMetaCtrl as userMeta">
  <div class="dashboard-content">
    <count-bar></count-bar>
    <carousel-bar></carousel-bar>
    <div class="row">
      <div class="col-lg-6 dashContentLeft">
        <quick-add></quick-add>
        <most-owned></most-owned>
      </div>
      <div class="col-lg-6 dashContentRight" pull-list></div>
    </div>
  </div>
  <aside class="sidebar" role="">
    <div class="row">
      <div class="col-xs-6 col-md-12" following>
      </div>
      <div class="col-xs-6 col-md-12" followers>
      </div>
    </div>
    <user-feed></user-feed>
  </aside>
</section>