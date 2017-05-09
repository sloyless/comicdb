<ng-transclude></ng-transclude>
<spinner></spinner>
<h2 class="text-uppercase">{{currentUser.firstName || 'User'}} {{currentUser.lastName}}</h2>
<h3>{{currentUser.location || 'Gotham City, NY'}}</h3>
<div class="social-container">
  <a ng-if="currentUser.facebook" ng-href="{{currentUser.facebook}}" title="View {{currentUser.first_name}}'s Facebook Profile" target="_blank"><i class="fa fa-fw fa-facebook"></i><span class="sr-only">Facebook</span></a>
  <a ng-if="currentUser.twitter" ng-href="{{currentUser.twitter}}" title="View {{currentUser.first_name}}'s Twitter Profile" target="_blank"><i class="fa fa-fw fa-twitter"></i><span class="sr-only">Twitter</span></a>
  <a ng-if="currentUser.instagram" ng-href="{{currentUser.instagram}}" title="View {{currentUser.first_name}}'s Instagram Gallery" target="_blank"><i class="fa fa-fw fa-instagram"></i><span class="sr-only">Instagram</span></a>
</div>