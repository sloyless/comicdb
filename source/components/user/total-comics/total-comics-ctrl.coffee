app.controller 'totalComicsCtrl', ($scope, $route, apiService) ->
  $scope.loading = true

  if $route.current.pathParams.user isnt undefined
    if $route.current.pathParams.user is $scope.userMeta.userName
      user = $scope.userMeta.userName
    else
      user = $route.current.pathParams.user
  else
    user = $scope.userMeta.userName

  apiService.collectionCount(user)
  .then (response) ->
    $scope.collectionCount = parseInt(response.data)
    $scope.loading = false
    false
  .catch (reason) ->
    console.log reason
  false