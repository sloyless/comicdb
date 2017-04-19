app.controller 'userFollowingCtrl', ($scope, apiService, md5) ->
  $scope.loading = true

  following = $scope.userMeta.follows
  $scope.followingArray = []

  angular.forEach following, (key) ->
    apiService.userLookup(key)
    .then (response) ->
      follow = {
        user_id: key,
        user_name: response.data[0].user_name,
        avatar: '//www.gravatar.com/avatar/' + md5.createHash(response.data[0].user_email) + '?s=200&d=' + encodeURI('http://comicmanager.com/assets/avatar-deadpool.png')
      }
      $scope.followingArray.push(follow)
    .catch (reason) ->
      console.error reason
    false
  $scope.loading = false

  false