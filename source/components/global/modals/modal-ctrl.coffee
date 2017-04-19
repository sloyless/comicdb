## Controller: Modals
app.controller 'modalController', ($scope, $uibModalInstance, $route, apiService) ->

  # This function will clear out sessionStorage data, close the modal, and refresh the state on the page. Used in the binding/unbinding process.
  refreshData = ->
    sessionStorage.removeItem('merchants')
    sessionStorage.removeItem('connectedMerchants')
    $uibModalInstance.close()
    $route.reload()

  # Dismisses the modal.
  $scope.ok = ->
    $uibModalInstance.close($scope.selected.item)
    false

  $scope.loginUser = ->
    $scope.buttonText = 'Please Wait'
    console.log $scope.loginForm
    false

  # Just close the modal.
  $scope.cancel = ->
    $uibModalInstance.dismiss('cancel')
    false
  false
