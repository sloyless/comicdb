<ng-transclude></ng-transclude>
<spinner></spinner>
<div data-module="count_bar">
  <div class="row">
    <div class="col-xs-6 col-lg-3">
      <strong><i class="fa fa-fw fa-hashtag"></i> Total Comics</strong>
      <span class="big-red">{{userMeta.collectionCount}}</span>
    </div>
    <div class="col-xs-6 col-lg-3">
      <strong><i class="fa fa-fw fa-archive"></i> Total Series</strong>
      <span class="big-red">{{userMeta.seriesCount}}</span>
    </div>
    <div class="col-xs-6 col-lg-3">
      <strong><i class="fa fa-fw fa-users"></i> Following</strong>
      <span class="big-red">{{userMeta.follows.length}}</span>
    </div>
    <div class="col-xs-6 col-lg-3">
      <strong><i class="fa fa-fw fa-users"></i> Followers</strong>
      <span class="big-red">{{userMeta.followers.length}}</span>
    </div>
    <div class="col-xs-12">
      <a ng-href="/#/profile"><i class="fa fa-fw fa-eye"></i> View your collection</a>
    </div>
  </div>
</div>