<ng-transclude></ng-transclude>
<spinner></spinner>
<ul class="list-unstyled user-feed-container">
  <li class="user-feed-item" ng-repeat="item in feed | orderBy: 'item.date_added'">
    <span class="user-feed-avatar"><img src="{{item.avatar}}" alt="" class="img-responsive img-circle" /></span>
    <span class="user-feed-content">
      {{item.meta_value}} added <a ng-href="/#/comic/{{item.comic_id}}"> {{item.series_name}} ({{item.series_vol}}) #{{item.issue_number}}</a> - <em>{{item.date_added}}</em>
    </span>
  </li>
</ul>