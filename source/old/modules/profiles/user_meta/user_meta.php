<ng-transclude></ng-transclude>
<spinner></spinner>
<div data-module="user-meta">
  <div class="row">
    <div class="col-xs-2 user-avatar">
      <img ng-src="{{userMeta.avatar}}" alt="" class="img-circle img-responsive" />
    </div>
    <div class="col-xs-10 user-meta-block">
      <div class="row">
        <div class="col-xs-6 col-md-12 user-name">
          <h2>{{userMeta.firstName}} {{userMeta.lastName}}</h2>
          {{userMeta.location}}
          <div class="social-icons">
            <a ng-if="userMeta.facebook" ng-href="{{userMeta.facebook}}" title="View {{userMeta.first_name}}'s Facebook Profile" target="_blank"><i class="fa fa-fw fa-facebook"></i><span class="sr-only">Facebook</span></a>
            <a ng-if="userMeta.twitter" ng-href="{{userMeta.twitter}}" title="View {{userMeta.first_name}}'s Twitter Profile" target="_blank"><i class="fa fa-fw fa-twitter"></i><span class="sr-only">Twitter</span></a>
            <a ng-if="userMeta.instagram" ng-href="{{userMeta.instagram}}" title="View {{userMeta.first_name}}'s Instagram Gallery" target="_blank"><i class="fa fa-fw fa-instagram"></i><span class="sr-only">Instagram</span></a>
          </div>
          <!-- <?php if (isset($profile_name) && $profile_name != '' && $profile_name != $userName) { ?>
          <div class="hidden-xs hidden-sm">
            <?php include (__ROOT__.'/modules/profiles/follow_button/follow_button.php'); ?>
          </div>
          <?php } ?> -->
        </div>
        <div class="col-xs-6 col-md-12 user-count">
          <div class="row">
            <div class="col-xs-6 col-md-2 text-center meta-total-issues">
              <h3 class="big-red">{{userMeta.collectionCount || 0}}</h3>
              comics
            </div>
            <div class="hidden-xs hidden-sm col-md-2 text-center meta-total-series">
              <h3 class="big-red">{{userMeta.seriesCount || 0}}</h3>
              series
            </div>
            <div class="col-xs-6 col-md-4 text-center meta-following">
              <h3 class="big-red hidden-md hidden-lg"><?php echo $followCount; ?></h3>
                <span class="hidden-xs hidden-sm text-danger">{{userMeta.follows.length}}</span> following
              <div class="hidden-xs hidden-sm">
                <ul class="nolist follow-list">
                  <!-- <?php echo $followBlock; ?> -->
                </ul>
              </div>
            </div>
            <div class="hidden-xs hidden-sm col-md-4 text-center meta-followers">
              <span class="text-danger">{{userMeta.followers.length}}</span> followers
              <div class="hidden-xs hidden-sm">
                <ul class="nolist follow-list">
                  <!-- <?php echo $followerBlock; ?> -->
                </ul>
              </div>
              <div class="hidden-xs hidden-sm">
                <ul class="nolist follow-list">
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>