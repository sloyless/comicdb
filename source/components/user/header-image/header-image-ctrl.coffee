app.controller 'headerImageCtrl', ($scope, apiService) ->
  $scope.loading = true

  apiService.getCover()
  .then (response) ->
    $scope.headerImage = response.data[0].cover_image
    $scope.loading = false
    false
  .catch (reason) ->
    console.log reason

  false