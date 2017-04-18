app.directive 'followButton', ->
  return {
    transclude: true,
    scope: true,
    controller: 'followButtonCtrl',
    controllerAs: 'followButton',
    templateUrl: '/modules/profiles/follow_button/follow_button.php'
  }