app.directive 'quickAdd', ->
  return {
    transclude: true,
    scope: true,
    controller: 'quickAddCtrl',
    controllerAs: 'quickAdd',
    templateUrl: '/modules/dashboard/quick_add/quick_add.php'
  }