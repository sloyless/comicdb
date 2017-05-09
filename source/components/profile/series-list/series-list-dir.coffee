app.directive 'seriesList', ->
  return {
    transclude: true,
    scope: true,
    controller: 'seriesListCtrl',
    controllerAs: 'seriesList',
    templateUrl: '/components/profile/series-list/series-list.php'
  }