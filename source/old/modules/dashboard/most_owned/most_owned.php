<ng-transclude></ng-transclude>
<spinner></spinner>
<div data-module="most_owned">
  <h3>Most Owned Comics</h3>
  <div>
    <a ng-repeat="comic in mostOwned" ng-href="/#/comic/{{comic.comic_id}}" class="most-owned-cover img-thumbnail" title="{{comic.series_name}} #{{comic.issue_number}}">
      <img ng-src="{{comic.cover_image}}" alt="{{comic.series_name}} #{{comic.issue_number}} Cover" class="img-responsive" />
    </a>
  </div>
</div>