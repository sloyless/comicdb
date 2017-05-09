app.controller 'userFollowersCtrl', ($scope, apiService, md5) ->
  $scope.loading = true

  if angular.fromJson(sessionStorage.getItem('user-followers')) is null
    apiService.getFollowers()
    .then (response) ->
      followers = response.data
      followerArray = []
      angular.forEach followers, (key, value) ->
        if key.user_id
          apiService.userLookup(key.user_id)
          .then (response) ->
            follower = {
              user_id: key.user_id,
              user_name: response.data[0].user_name,
              avatar: '//www.gravatar.com/avatar/' + md5.createHash(response.data[0].user_email) + '?s=200&d=' + encodeURI('http://comicmanager.com/assets/avatar-deadpool.png')
            }
            followerArray.push(follower)

            if followers.length is (value + 1)
              $scope.followerArray = followerArray
              sessionStorage.setItem('user-followers', angular.toJson($scope.followerArray))
              $scope.loading = false
          .catch (reason) ->
            console.error reason
            $scope.loading = false
        false
      false
    .catch (reason) ->
      console.log reason
  else
    $scope.followerArray = angular.fromJson(sessionStorage.getItem('user-followers'))
    $scope.loading = false

  false