<ng-transclude></ng-transclude>
<?php
  // $userInfo = new userInfo ();
  // $userInfo->userMeta($userID);
  // $followList = preg_replace('/}{/', ',', $userInfo->user_follows);
  // $followList = substr($followList, 1, -1);
  // $feedLength = 150;
  // $userInfo->showFeed ($followList, $feedLength);
?>
<section data-module="feed">
  <ul class="nolist user-feed-container">
    <li ng-repeat="item in feed | orderBy: 'item.date_added'"><span class="profile-avatar pull-left"><img src="{{item.avatar}}" alt="" class="img-responsive img-circle" /></span>{{item.meta_value}} added <a ng-href="comic.php?comic_id={{item.comic_id}}"> {{item.series_name}} ({{item.series_vol}}) #{{item.issue_number}}</a> - <em>{{item.date_added}}</em></li>
  </ul>
</section>