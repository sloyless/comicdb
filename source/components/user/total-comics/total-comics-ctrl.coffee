app.controller 'totalComicsCtrl', ($scope, apiService) ->
  $scope.loading = true

  apiService.collectionCount()
  .then (response) ->
    $scope.collectionCount = response.data
    $scope.loading = false
    false
  .catch (reason) ->
    console.log reason

  false