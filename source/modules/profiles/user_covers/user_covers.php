<ng-transclude></ng-transclude>
<spinner></spinner>
<div class="profile-background-container">
  <div class="profile-background">
    <div class="row">
      <div class="col-xs-2 col-md-1 profile-bg-image" ng-repeat="cover in userCovers">
        <img ng-src="{{cover.cover_image}}" alt="" class="img-responsive" />
      </div>
    </div>
  </div>
</div>