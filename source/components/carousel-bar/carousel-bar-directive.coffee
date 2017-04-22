app.directive 'carouselBar', ->
  return {
    transclude: true,
    scope: true,
    controller: 'carouselBarCtrl',
    controllerAs: 'carouselBar',
    templateUrl: '/components/carousel-bar/carousel-bar.php'
  }