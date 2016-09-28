'use strict'

## Init
# Initializes the app and loads up required modules, including Routing, Animation, and Sanitize.

app = angular.module('app', [
  'ngAnimate',
  'ngCookies',
  'ngResource',
  'ngSanitize',
  'ngRoute',
  'ui.bootstrap',
  'angular-md5'
])

## Config & Routing
# Handles routing for all subpages of the site.
app.config ['$routeProvider', ($routeProvider) ->
  route = (path, template) ->
    $routeProvider.when path,
      templateUrl: 'views/' + template + '.php',
      controller: 'rootController',
      activetab: template
  # Route templates and paths
  route('/', 'dashboard')
  route('/profile', 'profile')
  route('/add', 'add')
  route('/feed', 'feed')
  route('/profile', 'profile')
  route('/profile/:user', 'profile')
  route('/profile/:user/series/:series', 'profile')
  route('/settings', 'settings')
  route('/about', 'about')
  route('/contact', 'contact')
  route('/comic/:comic', 'comic')
  route('/series/:series', 'series')
  # 404
  $routeProvider.otherwise { redirectTo: '/' }
]

# API URL
## To-Do: MASK THIS!
url = '//geneva-api-dev.mybluemix.net'
