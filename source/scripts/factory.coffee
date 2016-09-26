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
  userMeta = ->
    path = '../ajax/userMeta.php'
    $http.post path

  showFeed = ->
    path = '../ajax/showFeed.php'
    $http.post path

  collectionCount = ->
    path = '../ajax/collectionCount.php'
    $http.post path

  seriesCount = ->
    path = '../ajax/seriesCount.php'
    $http.post path

  carouselComics = ->
    path = '../ajax/carouselComics.php'
    $http.post path

  mostOwned = ->
    path = '../ajax/mostOwnedComics.php'
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
    postData: postData
  }

  # Resets
  userMeta = {}
  feed = {}
  totalCount = {}
  seriesCount = {}
  carouselComics = {}
  mostOwned = {}
  postData = {}
  return service

# Factories
app.factory 'alertService', alertService
app.factory 'apiService', apiService