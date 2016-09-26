app.directive 'userMeta', ->
  return {
    transclude: true,
    scope: true,
    controller: 'userMetaCtrl',
    controllerAs: 'userMeta',
    templateUrl: '/modules/profiles/user_meta/user_meta.php'
  }