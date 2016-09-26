app.directive 'countBar', ->
  return {
    transclude: true,
    scope: true,
    controller: 'countBarCtrl',
    controllerAs: 'countBar',
    templateUrl: '/modules/dashboard/count_bar/count_bar.php'
  }