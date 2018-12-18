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
const routes = [
  { path: '/foo', component: Foo },
  { path: '/bar', component: Bar }
  { path: '/', component: 'dashboard' }
  { path: '/add', component: 'add' }
  { path: '/feed', component: 'feed' }
  { path: '/profile/:user', component: 'profile' }
  { path: '/profile/:user/:page', component: 'profile' }
  { path: '/profile/:user/series/:series', component: 'profile' }
  { path: '/settings', component: 'settings' }
  { path: '/about', component: 'about' }
  { path: '/contact', component: 'contact' }
  { path: '/comic/:comic', component: 'comic' }
  { path: '/series/:series', component: 'series' }
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

const app = new Vue({
  router
}).$mount('#app');

app.config ['$routeProvider', '$locationProvider', ($routeProvider, $locationProvider) ->
  route = (path, template, title) ->
    $routeProvider.when path,
      templateUrl: 'views/' + template + '.php',
      controller: 'rootController',
      activetab: template,
      title: title
  # Route templates and paths
  route('/', 'dashboard', 'Dashboard')
  route('/add', 'add', 'Add comics')
  route('/feed', 'feed', 'User feed')
  route('/profile/:user', 'profile', 'Profile')
  route('/profile/:user/:page', 'profile', 'Profile')
  route('/profile/:user/series/:series', 'profile', 'View series')
  route('/settings', 'settings', 'Settings')
  route('/about', 'about', 'About POW! Comic Book Manager')
  route('/contact', 'contact', 'Contact POW!')
  route('/comic/:comic', 'comic', 'View Comic')
  route('/series/:series', 'series', 'View Series')
  # 404
  $routeProvider.otherwise { redirectTo: '/' }
  $locationProvider.hashPrefix('')
  $locationProvider.html5Mode(false)
]

# Updates the HTML meta Title on route change.
app.run ['$rootScope', ($rootScope) ->
  $rootScope.$on '$routeChangeSuccess', (event, current) ->
    $rootScope.title = current.$$route.title
    false
  false
]