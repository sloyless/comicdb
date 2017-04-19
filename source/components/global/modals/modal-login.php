<button type="button" class="close" ng-click="cancel()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<div class="modal-wrapper screen">
  <form method="post" action="" name="loginform" class="form-horizontal" ng-submit="loginUser()">
    <header class="modal-header">
      <h4 class="modal-logo center-block text-center" id="loginFormModalLabel">
        <img src="../assets/logo.svg" alt="POW! Comic Book Manager" />
        Comic Book Manager
      </h4>
      <p class="text-center">Log into your Account</p>
    </header>
    <div class="modal-body">
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
      <button type="button" class="btn btn-lg btn-default" ng-click="cancel()"><i class="fa fa-times"></i> Close</button>
      <button type="submit" name="login" class="btn btn-lg btn-success form-submit"><span class="icon-loading"><i class="fa fa-spinner fa-spin"></i></span><span class="text-submit"><i class="fa fa-sign-in"></i> Login</span></button>
    </div>
  </form>
</div>
