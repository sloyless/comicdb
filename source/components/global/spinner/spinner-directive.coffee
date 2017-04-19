app.directive 'spinner', ->
  return {
    transclude: true,
    scope: true,
    templateUrl: '/components/global/spinner/spinner.php'
  }