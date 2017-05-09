app.controller 'userFollowingCtrl', ($scope, apiService, md5) ->
  $scope.loading = true

  following = $scope.userMeta.follows
  followingArray = []

  if angular.fromJson(sessionStorage.getItem('user-following')) is null
    angular.forEach following, (key, value) ->
      apiService.userLookup(key)
      .then (response) ->
        follow = {
          user_id: key,
          user_name: response.data[0].user_name,
          avatar: '//www.gravatar.com/avatar/' + md5.createHash(response.data[0].user_email) + '?s=200&d=' + encodeURI('http://comicmanager.com/assets/avatar-deadpool.png')
        }
        followingArray.push(follow)

        if following.length is (value + 1)
          $scope.followingArray = followingArray
          sessionStorage.setItem('user-following', angular.toJson($scope.followingArray))
          $scope.loading = false
      .catch (reason) ->
        console.error reason
      false
  else
    $scope.followingArray = angular.fromJson(sessionStorage.getItem('user-following'))
    $scope.loading = false

  false