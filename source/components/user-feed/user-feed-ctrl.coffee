app.controller 'userFeedCtrl', ($scope, apiService, md5) ->
  $scope.loading = true
  apiService.showFeed($scope.numitems)
  .then (response) ->
    feed = response.data
    angular.forEach feed, (key) ->
      key.avatar = '//www.gravatar.com/avatar/' + md5.createHash(key.user_email) + '?s=200&d=' + encodeURI('http://comicmanager.com/assets/avatar-deadpool.png')
    $scope.feed = feed
    $scope.loading = false
    false
  .catch (reason) ->
    console.log reason