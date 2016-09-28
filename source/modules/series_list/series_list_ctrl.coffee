app.controller 'seriesListCtrl', ($scope, $route, apiService) ->
  $scope.loading = true
  $currentUser = $route.current.pathParams.user if $route.current.pathParams.user isnt undefined
  $scope.currentUser = $currentUser

  apiService.seriesList($currentUser)
  .then (response) ->
    $scope.seriesList = response.data
    console.log response.data
    $scope.loading = false
  .catch (reason) ->
    console.log reason
  console.log('Series List: Yep.')