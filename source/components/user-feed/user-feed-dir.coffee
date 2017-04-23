app.directive 'userFeed', ->
  return {
    restrict: 'E',
    transclude: true,
    scope: {
      numitems: '='
    },
    controller: 'userFeedCtrl',
    controllerAs: 'userFeed',
    templateUrl: '/components/user-feed/user-feed.php',
    link: (scope,elem,numitems) ->
      console.log scope.numitems
      false
  }