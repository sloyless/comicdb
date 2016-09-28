app.controller 'userMetaCtrl', ($scope, $route, apiService, md5) ->
  $scope.loading = true
  $scope.userMeta = {}
  $currentUser = $route.current.pathParams.user if $route.current.pathParams.user isnt undefined

  apiService.userMeta($currentUser)
  .then (response) ->
    userMeta = response.data
    $scope.userMeta = {}
    $scope.userMeta.userId = userMeta[0].user_id
    $scope.userMeta.userEmail = md5.createHash(userMeta[0].user_email)
    $scope.userMeta.userName = userMeta[0].user_name
    $scope.userMeta.apiKey = userMeta[0].apiKey
    $scope.userMeta.avatar = 'http://www.gravatar.com/avatar/' + $scope.userMeta.userEmail + '?s=200&d=' + encodeURIComponent('http://comicmanager.com/assets/avatar-deadpool.png' || userMeta[0].avatar)

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
          userMeta.follows = key.meta_value
      false
    follows = userMeta.follows.split('}{')
    $scope.userMeta.follows = []
    angular.forEach follows, (key, value) ->
      key = key.replace('{', '').replace('}', '')
      $scope.userMeta.follows[value] = key
      false
    $scope.loading = false
    console.log $scope.userMeta
  
  $scope.loading = true

  apiService.collectionCount($currentUser)
  .then (result) ->
    $scope.userMeta.collectionCount = result.data
    false
  .catch (reason) ->
    console.log reason
  
  apiService.seriesCount($currentUser)
  .then (result) ->
    $scope.userMeta.seriesCount = result.data
    false
  .catch (reason) ->
    console.log reason

  apiService.getFollowers($currentUser)
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