app.directive 'userFollowing', ->
  return {
    transclude: true,
    scope: true,
    controller: 'userFollowingCtrl',
    controllerAs: 'userFollowing',
    templateUrl: '/components/user/user-following/user-following.php'
  }