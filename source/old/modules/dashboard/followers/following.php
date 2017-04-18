<ng-transclude></ng-transclude>
<div data-module="dashboard_following" class="follow-module">
  <h3>Following</h3>
  <ul class="nolist follow-list">
    <li ng-repeat="follow in userMeta.follows">
      <a href="/profile/{{follow.user_name}}">
        <img src="{{follow.avatar}}" alt="{{follow.first_name}} {{follow.last_name}}" class="img-circle img-responsive" />
      </a>
    </li>
  </ul>
</div>