app.directive 'feed', ->
  return {
    transclude: true,
    scope: true,
    controller: 'feedCtrl',
    controllerAs: 'feedList',
    templateUrl: '/modules/feed/feed.php'
  }