<ng-transclude></ng-transclude>
<spinner></spinner>
<div class="carousel-bar">
  <div class="row">
    <h3 class="text-center text-uppercase">Comic Spotlight</h3>
    <div id="carousel_bar_carousel" uib-carousel template-url="/components/carousel-bar/carousel-template.html" active="active" interval="5000">
      <div uib-slide class="item" ng-repeat="slide in carouselComics track by $index" index="$index">
        <div class="carousel-caption">
            <div class="carousel-left">
              <a ng-href="/#/comic/{{slide.comic_id}}" class="carousel-image">
                <img ng-src="/{{slide.cover_image}}" alt="{{slide.series_name}} ({{slide.series_vol}}) #{{slide.issue_number}} Cover" />
              </a>
            </div>
            <div class="carousel-right">
              <div class="logo-{{slide.publisherShort}} pull-right hidden-xs hidden-sm hidden-md"></div>
              <h4><a ng-href="/#/comic/{{slide.comic_id}}">{{slide.series_name}} ({{slide.series_vol}}) #{{slide.issue_number}}</a></h4>
              <div class="story-block">
                <h5><em>"{{slide.story_name}}"</em></h5>
                <div class="slide-plot hidden-xs hidden-sm" ng-bind-html="slide.plot"></div>
                <a href="/#/comic/{{slide.comic_id}}" class="read-more">[Read More]</a>
              </div>
              <div class="button-block hidden-xs hidden-sm hidden-md">
                <a href="/#/comic/{{slide.comic_id}}" class="btn btn-primary">View Issue</a>
                <a href="/#/series/{{slide.series_id}}" class="btn btn-default">View Series</a>
              </div>
            </div>
            <div class="button-block hidden-lg">
              <a href="/#/comic/{{slide.comic_id}}" class="btn btn-primary">View Issue</a>
              <a href="/#/series/{{slide.series_id}}" class="btn btn-default">View Series</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>