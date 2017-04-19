app.controller 'userCtrl', ($scope, $route, apiService) ->
  $scope.isCollapsed = true
  $scope.$route = $route

  if angular.fromJson(localStorage.getItem('user')) isnt null
    $scope.userMeta = angular.fromJson(localStorage.getItem('user'))
    console.log 'From Cache'
    console.log $scope.userMeta
  else
    apiService.userMeta()
    .then (response) ->
      userMeta = response.data
      $scope.userMeta = apiService.getUserMeta userMeta
      console.log 'From dB'
      console.log $scope.userMeta
      localStorage.setItem('user', angular.toJson($scope.userMeta))