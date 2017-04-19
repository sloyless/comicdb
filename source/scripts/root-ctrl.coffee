# Root Controller
app.controller 'rootController', ($scope, $uibModal) ->
  $scope.loginForm = {}

  $scope.random = ->
    return 0.5 - Math.random()

  if angular.fromJson(localStorage.getItem('user')) isnt null
    $scope.userMeta = angular.fromJson(localStorage.getItem('user'))
    console.log 'From Cache'
    console.log $scope.userMeta
  else
    apiService.userMeta()
    .then (response) ->
      userMeta = response.data
      $scope.userMeta = apiService.getUserMeta userMeta
      console.log 'From dB'
      console.log $scope.userMeta
      localStorage.setItem('user', angular.toJson($scope.userMeta))

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