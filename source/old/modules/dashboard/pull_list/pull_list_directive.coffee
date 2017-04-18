app.directive 'pullList', ->
  return {
    transclude: true,
    scope: true,
    controller: 'pullListCtrl',
    controllerAs: 'pullList',
    templateUrl: '/modules/dashboard/pull_list/pull_list.php'
  }