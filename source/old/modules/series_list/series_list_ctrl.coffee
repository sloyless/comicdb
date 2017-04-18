app.controller 'seriesListCtrl', ($scope, $route, apiService) ->
  $scope.loading = true
  currentUser = $route.current.pathParams.user if $route.current.pathParams.user isnt undefined
  $scope.currentUser = currentUser

  apiService.seriesList(currentUser)
  .then (response) ->
    $scope.seriesList = response.data
    # Call out to series, get earliest issue in dB

    console.log response.data
    $scope.loading = false
  .catch (reason) ->
    console.error reason
  console.log('Series List: Yep.')