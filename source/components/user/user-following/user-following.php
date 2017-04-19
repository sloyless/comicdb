<ng-transclude></ng-transclude>
<spinner></spinner>
<div class="user-following">
  <span class="text-uppercase">Following: {{followingArray.length || '0'}}</span>
  <ul class="list-unstyled follow-list hidden-xs hidden-sm">
    <li ng-repeat="follow in followingArray | limitTo:4 | orderBy:random">
      <a ng-href="/profile/{{follow.user_name}}">
        <img ng-src="{{follow.avatar}}" alt="" class="img-circle img-responsive" />
      </a>
    </li>
    <li ng-if="followingArray.length >= 4" class="view-more-container"><button role="button" class="btn btn-link btn-view-more">view more</button></li>
  </ul>
</div>