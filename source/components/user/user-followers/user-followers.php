<ng-transclude></ng-transclude>
<spinner></spinner>
<div class="user-followers">
  <span class="text-uppercase">Followers: {{followerArray.length}}</span>
  <ul class="list-unstyled follow-list text-center hidden-xs hidden-sm">
    <li ng-repeat="follower in followerArray | limitTo:4 | orderBy:random">
      <a ng-href="/profile/{{follower.user_name}}">
        <img ng-src="{{follower.avatar}}" alt="" class="img-circle img-responsive" />
      </a>
    </li>
    <li ng-if="followerArray.length >= 4" class="view-more-container"><button role="button" class="btn btn-link btn-view-more">view more</button></li>
  </ul>
</div>