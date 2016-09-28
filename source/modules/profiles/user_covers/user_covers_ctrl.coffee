app.controller 'userCoversCtrl', ($scope, $route, apiService, md5) ->
  $currentUser = $route.current.pathParams.user if $route.current.pathParams.user isnt undefined
  $scope.loading = true
  apiService.userCovers($currentUser)
  .then (response) ->
    userCovers = response.data
    angular.forEach userCovers, (key) ->
      if key.cover_image isnt ''
        key.cover_image = key.cover_image.replace("-medium", "-thumb")
      false
    $scope.userCovers = userCovers
    $scope.loading = false
    false
  .catch (reason) ->
    console.log reason