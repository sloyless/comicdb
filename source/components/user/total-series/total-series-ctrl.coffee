app.controller 'totalSeriesCtrl', ($scope, $route, apiService) ->
  $scope.loading = true

  if $route.current.pathParams.user isnt undefined
    if $route.current.pathParams.user is $scope.userMeta.userName
      user = $scope.userMeta.userName
    else
      user = $route.current.pathParams.user
  else
    user = $scope.userMeta.userName

  apiService.seriesCount(user)
  .then (response) ->
    $scope.seriesCount = parseInt(response.data)
    $scope.loading = false
    false
  .catch (reason) ->
    console.log reason
    $scope.loading = false

  false