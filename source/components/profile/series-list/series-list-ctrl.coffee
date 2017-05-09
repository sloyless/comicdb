app.controller 'seriesListCtrl', ($scope, $route, $timeout, $location, apiService) ->
  promise = $timeout()
  $scope.loading = true
  $scope.seriesList = []
  itemsPerPage = 32
  type = 'series'

  $scope.seriesCount = angular.fromJson(sessionStorage.getItem('user-seriesCount')) if angular.fromJson(sessionStorage.getItem('user-seriesCount')) isnt null
  $scope.numPages = Math.ceil($scope.seriesCount / itemsPerPage)

  $scope.getNumber = (num) ->
    return new Array(num)

  getCover = (key) ->
    apiService.getCover($scope.currentUser, key.series_id)
    .then (response) ->
      return key.series_cover = response.data[0].cover_image
    .catch (reason) ->
      console.error reason

  getIssueCount = (key) ->
    apiService.seriesIssueCount($scope.currentUser, key.series_id)
    .then (response) ->
      return key.series_count = response.data
    .catch (reason) ->
      console.error reason

  getIssueData = (key) ->
    promise = promise.then ->
      getIssueCount(key)
      getCover(key)
      key.loading = false
      return $timeout(2000)

  $scope.prevPage = (currentPage) ->
    if currentPage > 1
      prevPage = currentPage - 1
      returnPath = '/profile/' + $scope.currentUser + '/' + prevPage
      console.log returnPath
      $location.path returnPath
      false
    else
      false

  $scope.nextPage = (currentPage) ->
    if currentPage <= $scope.numPages
      nextPage = currentPage + 1
      returnPath = '/profile/' + $scope.currentUser + '/' + nextPage
      $location.path returnPath
      false
    else
      false

  if $route.current.pathParams.user isnt undefined
    if $route.current.pathParams.user isnt $scope.userMeta.userName
      $scope.currentUser = $route.current.pathParams.user
    else
      $scope.currentUser = $scope.userMeta.userName

  if $route.current.pathParams.page is undefined
    console.log 'First page'
    $scope.currentPage = 1
    apiService.seriesList($scope.currentUser, type)
    .then (response) ->
      $scope.seriesList = response.data
      $scope.loading = false
      angular.forEach $scope.seriesList, (key) ->
        key.loading = true
        getIssueData(key)
    .catch (reason) ->
      console.error reason
      $scope.loading = false
  else
    $scope.currentPage = parseInt($route.current.pathParams.page)
    if $scope.currentPage <= $scope.numPages && $scope.currentPage isnt 1
      offset = (itemsPerPage * $scope.currentPage) - itemsPerPage

      apiService.seriesList($scope.currentUser, type, offset)
      .then (response) ->
        $scope.seriesList = response.data
        $scope.loading = false
        angular.forEach $scope.seriesList, (key) ->
          key.loading = true
          getIssueData(key)
      .catch (reason) ->
        console.error reason
        $scope.loading = false
      false
    else
      returnPath = '/profile/' + $scope.currentUser
      $location.path returnPath
  false