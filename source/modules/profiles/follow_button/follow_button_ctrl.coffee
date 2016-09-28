app.controller 'followButtonCtrl', ($scope, $route) ->
  $currentUser = $route.current.pathParams.user if $route.current.pathParams.user isnt undefined
  $scope.currentUser = $currentUser
  console.log('Follow Button: Yep.')