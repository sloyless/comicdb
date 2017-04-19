app.directive 'totalSeries', ->
  return {
    transclude: true,
    scope: true,
    controller: 'totalSeriesCtrl',
    controllerAs: 'totalSeries',
    templateUrl: '/components/user/total-series/total-series.php'
  }