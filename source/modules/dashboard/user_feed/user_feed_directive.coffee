app.directive 'userFeed', ->
  return {
    transclude: true,
    scope: true,
    controller: 'userFeedCtrl',
    controllerAs: 'userFeed',
    templateUrl: '/modules/dashboard/user_feed/user_feed.php'
  }