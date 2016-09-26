app.controller 'mostOwnedCtrl', ($scope, apiService) ->
  $scope.mostOwned = {}
  $scope.loading = true
  apiService.mostOwned()
  .then (result) ->
    mostOwned = result.data
    angular.forEach mostOwned, (key) ->
      if key.cover_image isnt ''
        key.cover_image = key.cover_image.replace("-medium", "-small")
      false
    $scope.mostOwned = mostOwned
    $scope.loading = false
    false
  .catch (reason) ->
    console.log reason
  console.log('Most Owned: Yep.')