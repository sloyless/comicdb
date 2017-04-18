app.directive 'spinner', ->
  return {
    transclude: true,
    scope: true,
    templateUrl: '/modules/spinner/spinner.php'
  }