app.controller 'countBarCtrl', ($scope, apiService) ->
  $scope.countBar = {}
  $scope.loading = true
  apiService.collectionCount()
  .then (result) ->
    $scope.countBar.collectionCount = result.data
    false
  .catch (reason) ->
    console.log reason
  
  apiService.seriesCount()
  .then (result) ->
    $scope.countBar.seriesCount = result.data
    $scope.loading = false
    false
  .catch (reason) ->
    console.log reason

  console.log('Count Bar: Yep.')