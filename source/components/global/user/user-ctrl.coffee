app.controller 'userCtrl', ($scope, apiService) ->
  $scope.loading = true
  $scope.isCollapsed = true

  if angular.fromJson(localStorage.getItem('user')) isnt null
    $scope.userMeta = angular.fromJson(localStorage.getItem('user'))
    console.log 'From Cache'
    console.log $scope.userMeta
    $scope.loading = false
  else
    apiService.userMeta()
    .then (response) ->
      userMeta = response.data
      $scope.userMeta = apiService.getUserMeta userMeta
      console.log 'From dB'
      console.log $scope.userMeta
      $scope.loading = false
      localStorage.setItem('user', angular.toJson($scope.userMeta))