app.directive 'seriesList', ->
  return {
    transclude: true,
    scope: true,
    controller: 'seriesListCtrl',
    controllerAs: 'seriesList',
    templateUrl: '/modules/series_list/series_list.php'
  }