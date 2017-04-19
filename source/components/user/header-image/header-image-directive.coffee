app.directive 'headerImage', ->
  return {
    transclude: true,
    scope: true,
    controller: 'headerImageCtrl',
    controllerAs: 'headerImage',
    templateUrl: '/components/user/header-image/header-image.php'
  }