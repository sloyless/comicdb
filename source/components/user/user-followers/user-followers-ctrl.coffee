app.controller 'userFollowersCtrl', ($scope, apiService, md5) ->
  $scope.loading = true

  apiService.getFollowers()
  .then (response) ->
    followers = response.data
    $scope.followerArray = []
    angular.forEach followers, (key) ->
      apiService.userLookup(key.user_id)
      .then (response) ->
        follower = {
          user_id: key.user_id,
          user_name: response.data[0].user_name,
          avatar: '//www.gravatar.com/avatar/' + md5.createHash(response.data[0].user_email) + '?s=200&d=' + encodeURI('http://comicmanager.com/assets/avatar-deadpool.png')
        }
        $scope.followerArray.push(follower)
      .catch (reason) ->
        console.error reason
      false
    $scope.loading = false
    false
  .catch (reason) ->
    console.log reason

  false