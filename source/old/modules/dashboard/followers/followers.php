<ng-transclude></ng-transclude>
<div data-module="dashboard_followers" class="follow-module">
  <h3>Followers</h3>
  <ul class="nolist follow-list">
    <li ng-repeat="follow in userMeta.followers">
      <a href="/profile/{{follow.user_name}}">
        <img src="{{follow.avatar}}" alt="{{follow.first_name}} {{follow.last_name}}" class="img-circle img-responsive" />
      </a>
    </li>
  </ul>
</div>