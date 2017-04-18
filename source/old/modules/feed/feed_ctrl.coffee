app.controller 'feedCtrl', ($scope, apiService) ->
  apiService.showFeed()
  .then (response) ->
    $scope.feed = response.data
    console.log $scope.feed
    false
  .catch (reason) ->
    console.log reason

  $scope = $scope
  console.log('Feed: Yep.')