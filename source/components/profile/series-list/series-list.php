<ng-transclude></ng-transclude>
<spinner></spinner>
<div class="section-nav">
  <div class="section-search">
    <div class="form-group">
      <input type="text" class="form-control input-sm" placeholder="Search collection" ng-model="$ctrl.query">
    </div>
  </div>
  <div class="section-pagenav text-center hidden-xs hidden-sm">
    <ul class="pagination">
      <li ng-class="(currentPage == 1) ? 'disabled' : ''">
        <a ng-click="prevPage(currentPage)" aria-label="Previous">
          <span aria-hidden="true"><i class="fa fa-fw fa-chevron-left"></i></span>
        </a>
      </li>
      <li ng-repeat="i in getNumber(numPages) track by $index" ng-class="($index+1 == currentPage) ? 'active' : ''">
        <span ng-if="$index+1 == currentPage">{{$index+1}} <span class="sr-only">(current)</span></span>
        <a ng-if="$index+1 != currentPage" ng-href="/#/profile/{{currentUser}}/{{$index+1}}">{{$index+1}}</a></li>
      <li ng-class="(currentPage == numPages) ? 'disabled' : ''">
        <a ng-click="nextPage(currentPage)" aria-label="Next">
          <span aria-hidden="true"><i class="fa fa-fw fa-chevron-right"></i></span>
        </a>
      </li>
    </ul>
  </div>
  <div class="section-display text-right">
    <button class="btn btn-sm btn-default sort-control" ng-click="setDisplay('thumbLg')" ng-class="thumbLg ? 'btn-primary' : 'btn-default'"><i class="fa fa-th-large"></i></button>
    <button class="btn btn-sm btn-default sort-control" ng-click="setDisplay('thumbSm')" ng-class="thumbSm ? 'btn-primary' : 'btn-default'"><i class="fa fa-th"></i></button>
    <button class="btn btn-sm btn-default sort-control" ng-click="setDisplay('listMode')" ng-class="listMode ? 'btn-primary' : 'btn-default'"><i class="fa fa-list"></i></button>
  </div>
</div>
<ul id="inventoryTable" class="row" ng-class="{ 'layout-thumbLg': thumbLg, 'layout-thumbSm': thumbSm, 'layout-list': listMode }">
  <li class="table-header font-raleway text-uppercase">
    <div class="series-list-row">
      <div class="series-info">
        <div class="series-title">Series Name</div>
      </div>
      <div class="volume-number">
        <span>Vol.</span>
      </div>
      <div class="series-extra">
        <span>#</span>
      </div>
    </div>
  </li>
  <li ng-repeat="series in seriesList | filter:$ctrl.query track by series.series_id">
    <div class="series-list-row">
      <a ng-href="/#/profile/{{currentUser}}/series/{{series.series_id}}" class="series-info">
        <div class="comic-image">
          <img ng-src="/{{series.series_cover}}" src="/assets/images/placeholder.jpg" alt="{{series.series_name}}" class="img-responsive" onerror="if (this.src != '/assets/images/placeholder.jpg') this.src = '/assets/images/placeholder.jpg';" />
        </div>
        <div class="series-title text-uppercase"><h3>{{series.series_name}}</h3> <span>({{series.series_vol}})</span></div>
      </a>
      <div class="volume-number">
        <span>{{series.series_vol}}</span>
      </div>
      <div class="series-extra">
        <div class="series-list-row">
          <div class="series-publisher hidden-xs hidden-sm hidden-md">
            <div class="logo-{{series.publisher}} sm-logo">{{series.publisher}}</div>
          </div>
          <div class="series-count text-uppercase">
            <div class="issue-loading" ng-if="series.loading == true">
              Loading<span>.</span><span>.</span><span>.</span>
            </div>
            <div ng-if="series.loading != true">
              {{series.series_count}}
              <span ng-if="series.series_count == 1">Issue</span>
              <span ng-if="series.series_count > 1">Issues</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </li>
</ul>
