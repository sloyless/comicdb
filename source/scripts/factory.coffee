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
apiService = ($http, md5) ->
  userMeta = (currentUser) ->
    if currentUser isnt undefined
      path = '../functions/api/userMeta.php?user=' + currentUser
    else
      path = '../functions/api/userMeta.php'
    $http.post path

  showFeed = ->
    path = '../functions/api/showFeed.php'
    $http.post path

  collectionCount = (currentUser) ->
    if currentUser isnt undefined
      path = '../functions/api/collectionCount.php?user=' + currentUser
    else
      path = '../functions/api/collectionCount.php'
    $http.post path

  seriesCount = (currentUser) ->
    if currentUser isnt undefined
      path = '../functions/api/seriesCount.php?user=' + currentUser
    else
      path = '../functions/api/seriesCount.php'
    $http.post path

  carouselComics = ->
    path = '../functions/api/carouselComics.php'
    $http.post path

  mostOwned = ->
    path = '../functions/api/mostOwnedComics.php'
    $http.post path

  getFollowers = (currentUser) ->
    if currentUser isnt undefined
      path = '../functions/api/getFollowers.php?user=' + currentUser
    else
      path = '../functions/api/getFollowers.php'
    $http.post path

  userCovers = (currentUser) ->
    if currentUser isnt undefined
      path = '../functions/api/userCovers.php?user=' + currentUser
    else
      path = '../functions/api/userCovers.php'
    $http.post path

  seriesList = (currentUser, type) ->
    type = 'series' if type is undefined
    if currentUser isnt undefined
      path = '../functions/api/seriesList.php?user=' + currentUser + '&type=' + type
    else
      path = '../functions/api/seriesList.php?type=' + type
    $http.post path

  postData = (apiUrl, data) ->
    # Post data back to the API
    $http.post apiUrl, data

  getUserMeta = (userMeta) ->
    metaProfile = {}
    metaProfile.userId = userMeta[0].user_id
    metaProfile.userEmail = md5.createHash(userMeta[0].user_email)
    metaProfile.userName = userMeta[0].user_name
    metaProfile.apiKey = userMeta[0].apiKey
    metaProfile.avatar = 'http://www.gravatar.com/avatar/' + metaProfile.userEmail + '?s=200&d=' + encodeURIComponent('http://comicmanager.com/assets/avatar-deadpool.png' || userMeta[0].avatar)

    angular.forEach userMeta, (key) ->
      switch key.meta_key
        when 'admin'
          metaProfile.admin = key.meta_value
        when 'facebook_url'
          metaProfile.facebook = key.meta_value
        when 'first_name'
          metaProfile.firstName = key.meta_value
        when 'last_name'
          metaProfile.lastName = key.meta_value
        when 'twitter_url'
          metaProfile.twitter = key.meta_value
        when 'instagram_url'
          metaProfile.instagram = key.meta_value
        when 'location'
          metaProfile.location = key.meta_value
        when 'user_follows'
          userMeta.follows = key.meta_value
      false
    follows = userMeta.follows.split('}{')
    metaProfile.follows = []
    angular.forEach follows, (key, value) ->
      key = key.replace('{', '').replace('}', '')
      metaProfile.follows[value] = key
      false
    return metaProfile

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
    postData: postData,
    getUserMeta: getUserMeta
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
  getUserMeta = {}
  return service

# Factories
app.factory 'alertService', alertService
app.factory 'apiService', apiService