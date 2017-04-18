app.directive 'countBar', ->
  return {
    transclude: true,
    scope: true,
    templateUrl: '/modules/dashboard/count_bar/count_bar.php'
  }