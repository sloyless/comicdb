<header class="page-header-container row" role="banner">
  <header-image></header-image>
  <div class="page-header-content">
    <div class="col-xs-12">
      <h2 class="text-uppercase">{{userMeta.firstName || 'User'}} {{userMeta.lastName}}</h2>
      <h3>{{userMeta.location || 'Gotham City, NY'}}</h3>
      <div class="social-container">
        <a ng-if="userMeta.facebook" ng-href="{{userMeta.facebook}}" title="View {{userMeta.first_name}}'s Facebook Profile" target="_blank"><i class="fa fa-fw fa-facebook"></i><span class="sr-only">Facebook</span></a>
        <a ng-if="userMeta.twitter" ng-href="{{userMeta.twitter}}" title="View {{userMeta.first_name}}'s Twitter Profile" target="_blank"><i class="fa fa-fw fa-twitter"></i><span class="sr-only">Twitter</span></a>
        <a ng-if="userMeta.instagram" ng-href="{{userMeta.instagram}}" title="View {{userMeta.first_name}}'s Instagram Gallery" target="_blank"><i class="fa fa-fw fa-instagram"></i><span class="sr-only">Instagram</span></a>
      </div>
    </div>
    <div class="meta-block col-xs-12">
      <ul class="list-unstyled font-raleway">
        <li total-comics></li>
        <li total-series></li>
        <li class="meta-followers text-center">
          <user-followers></user-followers>
          <user-following></user-following>
        </li>
      </ul>
    </div>
  </div>
</header>
<section class="series-list row">
  <div class="col-xs-12">
    <div class="section-nav">
      <div class="section-search">
        <div class="input-group">
          <input type="text" class="form-control input-sm" placeholder="Search collection">
          <span class="input-group-btn">
          <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </div>
      <div class="section-pagenav text-center hidden-xs hidden-sm">
        <ul class="pagination">
          <li class="disabled">
            <a href="#" aria-label="Previous">
              <span aria-hidden="true"><i class="fa fa-fw fa-chevron-left"></i></span>
            </a>
          </li>
          <li class="active"><span>1 <span class="sr-only">(current)</span></span></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li>
            <a href="#" aria-label="Next">
              <span aria-hidden="true"><i class="fa fa-fw fa-chevron-right"></i></span>
            </a>
          </li>
        </ul>
      </div>
      <div class="section-display text-right">
        <button class="btn btn-sm btn-primary sort-control active" id="sort-thumb-lg"><i class="fa fa-th-large"></i></button>
        <button class="btn btn-sm btn-default sort-control" id="sort-thumb-sm"><i class="fa fa-th"></i></button>
        <button class="btn btn-sm btn-default sort-control" id="sort-list"><i class="fa fa-list"></i></button>
      </div>
    </div>
    <series-list></series-list>
  </div>
</section>