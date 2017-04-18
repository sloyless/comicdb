app.controller 'userMetaCtrl', ($scope, $route, apiService) ->
  $scope.loading = true
  $scope.userMeta = {}
  currentUser = $route.current.pathParams.user if $route.current.pathParams.user isnt undefined
  user = angular.fromJson(localStorage.getItem('user'))
  isProfile = true if currentUser is user.userId

  if isProfile
    $scope.userMeta = user
    console.log 'Looking at profile'
  else
    console.log 'Looking at another users profile'

    if angular.fromJson(localStorage.getItem('user-' + currentUser)) isnt null
      $scope.userMeta = angular.fromJson(localStorage.getItem('user-' + currentUser))
      console.log 'from cache'
    else
      apiService.userMeta(currentUser)
      .then (response) ->
        userMeta = response.data
        $scope.userMeta = apiService.getUserMeta userMeta
        localStorage.setItem('user-' + currentUser, angular.toJson($scope.userMeta))
        $scope.loading = false

  apiService.collectionCount(currentUser)
  .then (result) ->
    $scope.userMeta.collectionCount = result.data
    false
  .catch (reason) ->
    console.log reason

  apiService.seriesCount(currentUser)
  .then (result) ->
    $scope.userMeta.seriesCount = result.data
    false
  .catch (reason) ->
    console.log reason

  apiService.getFollowers(currentUser)
  .then (result) ->
    followers = result.data
    $scope.userMeta.followers = []
    angular.forEach followers, (key, value) ->
      $scope.userMeta.followers[value] = key.user_id
      false
    $scope.loading = false
    false
  .catch (reason) ->
    console.log reason