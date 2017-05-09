app.directive 'userMeta', ->
  return {
    transclude: true,
    scope: true,
    controller: 'userMetaCtrl',
    controllerAs: 'userMeta',
    templateUrl: '/components/user/user-meta/user-meta.php'
  }