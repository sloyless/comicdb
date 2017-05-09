app.controller 'userMetaCtrl', ($scope, $route, apiService) ->
  $scope.loading = true

  if $route.current.pathParams.user isnt undefined && $route.current.pathParams.user isnt $scope.userMeta.userName
    user = $route.current.pathParams.user
    if angular.fromJson(localStorage.getItem('user-' + user)) isnt null
      $scope.currentUser = angular.fromJson(localStorage.getItem('user-' + user))
      $scope.loading = false
    else
      apiService.userMeta(user)
      .then (response) ->
        userMeta = response.data
        $scope.currentUser = apiService.getUserMeta userMeta
        localStorage.setItem('user-' + user, angular.toJson($scope.currentUser))
        $scope.loading = false
      .catch (reason) ->
        console.error reason
        $scope.loading = false
  else
    $scope.currentUser = $scope.userMeta
  false