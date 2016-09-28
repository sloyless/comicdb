<ng-transclude></ng-transclude>
<spinner></spinner>
<div data-module="carousel_bar">
  <div class="row">
    <h3 class="text-center">Comic Spotlight</h3>
    <div id="carousel_bar_carousel" uib-carousel template-url="/modules/dashboard/carousel_bar/carousel-template.html" active="active" interval="5000">
      <div uib-slide class="item" ng-repeat="slide in carouselComics track by $index" index="$index">
        <div class="carousel-caption">
            <a ng-href="/#/comic/{{slide.comic_id}}" class="carousel-image">
              <img ng-src="/{{slide.cover_image}}" alt="{{slide.series_name}} ({{slide.series_vol}}) #{{slide.issue_number}} Cover" class="center-block" />
            </a>
            <div class="logo-{{slide.publisherShort}} pull-right hidden-xs hidden-sm hidden-md"></div>
            <h4><a ng-href="/#/comic/{{slide.comic_id}}">{{slide.series_name}} ({{slide.series_vol}}) #{{slide.issue_number}}</a></h4>
            <div class="story-block hidden-xs hidden-sm">
              <h5>{{slide.story_name}}</h5>
              <div ng-bind-html="slide.plot"></div>
              <a href="/#/comic/{{slide.comic_id}}" class="read-more">[Read More]</a>
            </div>
            <div class="button-block hidden-xs hidden-sm hidden-md">
              <a href="/#/comic/{{slide.comic_id}}" class="btn btn-danger">View Issue</a> <a href="/#/series/{{slide.series_id}}" class="btn btn-danger">View Series</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>