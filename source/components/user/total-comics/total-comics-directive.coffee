app.directive 'totalComics', ->
  return {
    transclude: true,
    scope: true,
    controller: 'totalComicsCtrl',
    controllerAs: 'totalComics',
    templateUrl: '/components/user/total-comics/total-comics.php'
  }