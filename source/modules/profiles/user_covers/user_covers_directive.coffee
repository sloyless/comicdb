app.directive 'userCovers', ->
  return {
    transclude: true,
    scope: true,
    controller: 'userCoversCtrl',
    controllerAs: 'userCovers',
    templateUrl: '/modules/profiles/user_covers/user_covers.php'
  }