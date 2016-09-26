# Root Controller
app.controller 'rootController', ($scope, $route, apiService) ->
  $scope.loading = true
  apiService.userMeta()
  .then (response) ->
    userMeta = response.data
    $scope.userMeta = {}
    $scope.userMeta.userId = userMeta[0].user_id
    $scope.userMeta.userEmail = userMeta[0].user_email
    $scope.userMeta.userName = userMeta[0].user_name
    $scope.userMeta.userPasswordHash = userMeta[0].user_password_hash
    $scope.userMeta.apiKey = userMeta[0].apiKey

    angular.forEach userMeta, (key) ->
      switch key.meta_key
        when 'admin'
          $scope.userMeta.admin = key.meta_value
        when 'facebook_url'
          $scope.userMeta.facebook = key.meta_value
        when 'first_name'
          $scope.userMeta.firstName = key.meta_value
        when 'last_name'
          $scope.userMeta.lastName = key.meta_value
        when 'twitter_url'
          $scope.userMeta.twitter = key.meta_value
        when 'instagram_url'
          $scope.userMeta.instagram = key.meta_value
        when 'location'
          $scope.userMeta.location = key.meta_value
        when 'user_follows'
          $scope.userMeta.follows = key.meta_value 
      false
    $scope.loading = false
    console.log $scope.userMeta
  .catch (reason) ->
    console.log reason

  $scope.$route = $route
  false