<div class="modal-wrapper screen">
  <header class="modal-header">
    <button type="button" class="close" ng-click="cancel()" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
    <h4 class="text-uppercase modal-title">
      Add An Issue
    </h4>
  </header>
  <form method="post" action="" name="addIssue" ng-submit="addIssue()">
    <div class="modal-body">
      <p>Add a single issue of a series. After submitting the series and issue, you will have a chance to add or edit details before it's added to your collection.</p>
      <div class="form-group">
        <label for="login_input_username" class="sr-only visuallyhidden">User Name</label>
        <div class="input-group">
          <div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>
          <input class="form-control" type="text" name="user_name" ng-model="loginForm.name" placeholder="User Name" required />
        </div>
      </div>
      <div class="form-group">
        <label for="login_input_password" class="sr-only visuallyhidden">Password</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
          <input class="form-control" type="password" name="user_password" ng-model="loginForm.password" autocomplete="off" placeholder="Password" required />
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-lg btn-default" ng-click="cancel()">Cancel</button>
      <button class="btn btn-primary btn-lg" type="button" ng-click="nextAddStep()" ng-disabled="form.$invalid"><span class="button-text" ng-show="buttonText == 'Please Wait'"><img ng-src="/assets/svg/elipsis.svg"/></span><span>{{ buttonText }}</span></button>
    </div>
  </form>
</div>
