app.directive 'mostOwned', ->
  return {
    transclude: true,
    scope: true,
    controller: 'mostOwnedCtrl',
    controllerAs: 'mostOwned',
    templateUrl: '/modules/dashboard/most_owned/most_owned.php'
  }