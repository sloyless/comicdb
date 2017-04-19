app.controller 'totalSeriesCtrl', ($scope, apiService) ->
  $scope.loading = true

  apiService.seriesCount()
  .then (response) ->
    $scope.seriesCount = response.data
    $scope.loading = false
    false
  .catch (reason) ->
    console.log reason
  false