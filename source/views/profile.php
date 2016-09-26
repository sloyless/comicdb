<?php 
  define('__ROOT__', dirname(dirname(__FILE__)));
  include (__ROOT__."/views/includes.php");
  if ($login->isUserLoggedIn () == false) {
    include (__ROOT__."/views/not_logged_in.php");
    die ();
  } 
?>
<header class="row profile-header">
  <div class="profile-background-container">
    <div class="profile-background">
      <div class="row">
        <?php 
          // Grabs 48 random covers for the profile page header
          $user->userCovers($profileID);
          echo $user->cover_list; 
        ?>
      </div>
    </div>
  </div>
  <user-meta></user-meta>
  <div class="profile-button-block">
    <?php if ($login->isUserLoggedIn () == true && !isset($profile_name)) { ?>
      <button class="btn btn-link button-settings" data-toggle="modal" data-target="#editProfileModal"><i class="fa fa-fw fa-gear"></i> <span class="sr-only">Edit Profile</span></button>
    <?php } elseif (isset($profile_name) && $profile_name != '' && $profile_name != $userName) { ?>
      <div class="hidden-md hidden-lg">
        <follow-button></follow-button>
      </div>
    <?php } ?>
    <button class="btn btn-link button-share"><i class="fa fa-fw fa-share"></i></button>
  </div>
</header>
<?php if ($login->isUserLoggedIn () == true && !isset($profile_name)) { ?>
  <?php include ('modules/profiles/edit_profile/edit_profile_modal.php'); ?>
<?php } ?>
<series-list>