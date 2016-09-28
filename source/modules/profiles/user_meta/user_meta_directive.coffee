app.directive 'userMeta', ->
  return {
    transclude: true,
    scope: true,
    templateUrl: '/modules/profiles/user_meta/user_meta.php'
  }