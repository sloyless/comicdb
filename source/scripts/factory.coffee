# Factories, Services, Etc.

# Alerts
alertService = ($timeout) ->
  add = (type, msg) ->
    alert = {
      type: type,
      msg: msg,
      close: ->
        closeAlert(@)
    }
    # Dimisses the alert after 5 seconds unless it's an error message.
    $timeout(closeAlert, 5000, true, alert) if alert.type isnt 'danger'
    return alerts.push alert

  closeAlert = (alert) ->
    return closeAlertIdx alerts.indexOf alert

  closeAlertIdx = (index) ->
    return alerts.splice index, 1

  clear = ->
    alerts = []
    false

  get = ->
    return alerts

  service = {
    add: add,
    closeAlert: closeAlert,
    closeAlertIdx: closeAlertIdx,
    clear: clear,
    get: get
  }
  alerts = []
  return service

# API Factory/Service
apiService = ($http) ->
  userMeta = (currentUser) ->
    if currentUser isnt undefined
      path = '../ajax/userMeta.php?user=' + currentUser
    else
      path = '../ajax/userMeta.php'
    $http.post path

  showFeed = ->
    path = '../ajax/showFeed.php'
    $http.post path

  collectionCount = (currentUser) ->
    if currentUser isnt undefined
      path = '../ajax/collectionCount.php?user=' + currentUser
    else
      path = '../ajax/collectionCount.php'
    $http.post path

  seriesCount = (currentUser) ->
    if currentUser isnt undefined
      path = '../ajax/seriesCount.php?user=' + currentUser
    else
      path = '../ajax/seriesCount.php'
    $http.post path

  carouselComics = ->
    path = '../ajax/carouselComics.php'
    $http.post path

  mostOwned = ->
    path = '../ajax/mostOwnedComics.php'
    $http.post path

  getFollowers = (currentUser) ->
    if currentUser isnt undefined
      path = '../ajax/getFollowers.php?user=' + currentUser
    else
      path = '../ajax/getFollowers.php'
    $http.post path

  userCovers = (currentUser) ->
    if currentUser isnt undefined
      path = '../ajax/userCovers.php?user=' + currentUser
    else
      path = '../ajax/userCovers.php'
    $http.post path

  seriesList = (currentUser, type) ->
    type = 'series' if type is undefined
    if currentUser isnt undefined
      path = '../ajax/seriesList.php?user=' + currentUser + '&type=' + type
    else
      path = '../ajax/seriesList.php?type=' + type
    $http.post path

  postData = (apiUrl, data) ->
    # Post data back to the API
    $http.post apiUrl, data

  service = {
    userMeta: userMeta,
    showFeed: showFeed,
    collectionCount: collectionCount,
    seriesCount: seriesCount,
    carouselComics: carouselComics,
    mostOwned: mostOwned,
    getFollowers: getFollowers,
    userCovers: userCovers,
    seriesList: seriesList,
    postData: postData
  }

  # Resets
  userMeta = {}
  feed = {}
  totalCount = {}
  seriesCount = {}
  carouselComics = {}
  mostOwned = {}
  followers: {}
  postData = {}
  userCovers = {}
  seriesList = {}
  return service

# Factories
app.factory 'alertService', alertService
app.factory 'apiService', apiService