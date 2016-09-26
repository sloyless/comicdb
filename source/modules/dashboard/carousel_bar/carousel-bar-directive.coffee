app.directive 'carouselBar', ->
  return {
    transclude: true,
    scope: true,
    controller: 'carouselBarCtrl',
    controllerAs: 'carouselBar',
    templateUrl: '/modules/dashboard/carousel_bar/carousel_bar.php'
  }