# Root Controller
app.controller 'rootController', ($scope, $uibModal, $route, apiService) ->
  $scope.loginForm = {}
  $scope.isCollapsed = true
  $scope.$route = $route

  if angular.fromJson(localStorage.getItem('displayMode')) isnt null
    mode = angular.fromJson(localStorage.getItem('displayMode'))
    switch mode
      when 'thumbLg'
        $scope.thumbLg = true
      when 'thumbSm'
        $scope.thumbSm = true
      when 'listMode'
        $scope.listMode = true
  else
    $scope.thumbLg = true

  $scope.random = ->
    return 0.5 - Math.random()

  $scope.setDisplay = (mode) ->
    # Reset all buttons
    $scope.thumbLg = false
    $scope.thumbSm = false
    $scope.listMode = false
    localStorage.removeItem('displayMode')

    switch mode
      when 'thumbLg'
        $scope.thumbLg = true
        localStorage.setItem('displayMode', angular.toJson('thumbLg'))
      when 'thumbSm'
        $scope.thumbSm = true
        localStorage.setItem('displayMode', angular.toJson('thumbSm'))
      when 'listMode'
        $scope.listMode = true
        localStorage.setItem('displayMode', angular.toJson('listMode'))
    false

  if angular.fromJson(sessionStorage.getItem('user')) isnt null
    $scope.userMeta = angular.fromJson(sessionStorage.getItem('user'))
  else
    apiService.userMeta()
    .then (response) ->
      userMeta = response.data
      $scope.userMeta = apiService.getUserMeta userMeta
      sessionStorage.setItem('user', angular.toJson($scope.userMeta))

  $scope.openModal = (type) ->
    modalDir = 'components/global/modals/'

    # Init the data object
    modalData = {
      animation: true,
      ariaLabelledBy: 'modal-title',
      ariaDescribedBy: 'modal-body',
      controller: 'modalController',
      controllerAs: 'modal',
      scope: $scope,
      windowClass: 'center-modal',
      size: 'md'
    }

    # Vars to pass to modal specific to the type
    switch type
      when 'login'
        $scope.buttonText = 'Login'
        modalData.templateUrl = modalDir + 'modal-login.php'
        modalData.resolve = {}
      when 'add-issue'
        $scope.buttonText = 'Add'
        modalData.templateUrl = modalDir + 'modal-add-issue.php'
        modalData.resolve = {}
      when 'add-series'
        $scope.buttonText = 'Add'
        modalData.templateUrl = modalDir + 'modal-add-series.php'
        modalData.resolve = {}

    # Launch the modal
    modalInstance = $uibModal.open modalData
    modalInstance.result.then (selectedItem) ->
      # Do stuff after the modal is closed
      $scope.selected = selectedItem
      false
    , ->
      false
    false
  false