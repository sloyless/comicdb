<header class="row profile-header" ng-controller="userMetaCtrl as userMeta">
  <user-covers></user-covers>
  <user-meta></user-meta>
  <div class="profile-button-block">
    <follow-button></follow-button>
    <button class="btn btn-link button-settings" ng-click="openModal('edit-profile')"><i class="fa fa-fw fa-gear"></i> <span class="sr-only">Edit Profile</span></button>
    <button class="btn btn-link button-share"><i class="fa fa-fw fa-share"></i></button>
  </div>
</header>
<series-list></series-list>