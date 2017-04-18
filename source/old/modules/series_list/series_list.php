<ng-transclude></ng-transclude>
<spinner></spinner>
<section data-module="series_list">
  <header class="row headline">
    <div class="col-xs-7 col-md-8">
      <h2>Collection</h2>
    </div>
    <div class="col-xs-5 col-md-4 sort-control-container">
      <button class="btn-xs btn-default sort-control active" id="sort-thumb-lg"><i class="fa fa-th-large"></i></button>
      <button class="btn-xs btn-default sort-control" id="sort-thumb-sm"><i class="fa fa-th"></i></button>
      <button class="btn-xs btn-default sort-control" id="sort-list"><i class="fa fa-list"></i></button>
    </div>
  </header>
  <ul id="inventory-table" class="row layout-thumbLg">
    <li class="col-xs-6 col-sm-4 col-md-3 col-lg-2" ng-repeat="series in seriesList">
      <div class="series-list-row">
        <a ng-href="/#/profile/{{currentUser}}/series/{{series.series_id}}" class="series-info">
          <div class="series-list-row">
            <div class="comic-image">
              <img ng-src="/{{series.series_cover}}" alt="{{series.series_name}}" class="img-responsive" />
            </div>
            <div class="series-title"><h3>{{series.series_name}}</h3></div>
          </div>
        </a>
        <div class="volume-number">
          <span>{{series.series_vol}}</span>
        </div>
        <div class="series-extra">
          <div class="series-list-row">
            <div class="series-publisher hidden-xs hidden-sm hidden-md">
              <?php if ($publisherName) { echo '<div class="logo-' . $publisherShort .' sm-logo">' . $publisherName . '</div>'; } ?>
            </div>
            <div class="series-count text-uppercase text-center">
              <?php echo $series_issue_count; ?>
            </div>
          </div>
        </div>
      </div>
    </li>
  </ul>
  <nav class="text-center">
    <ul class="pagination pagination-lg">
      <?php echo $comic->previousPage; ?>
      <?php echo $comic->pagination; ?>
      <?php echo $comic->nextPage; ?>
    </ul>
  </nav>
</section>