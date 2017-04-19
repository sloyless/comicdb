app.directive 'userFollowers', ->
  return {
    transclude: true,
    scope: true,
    controller: 'userFollowersCtrl',
    controllerAs: 'userFollowers',
    templateUrl: '/components/user/user-followers/user-followers.php'
  }