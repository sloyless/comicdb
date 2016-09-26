app.directive 'followers', ->
  return {
    transclude: true,
    scope: true,
    controller: 'followersCtrl',
    controllerAs: 'followers',
    templateUrl: '/modules/dashboard/followers/followers.php'
  }

app.directive 'following', ->
  return {
    transclude: true,
    scope: true,
    controller: 'followingCtrl',
    controllerAs: 'following',
    templateUrl: '/modules/dashboard/followers/following.php'
  }