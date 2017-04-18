<!-- Site wrapper begins -->
<header id="mainHeader" role="banner" class="container-fluid" ng-controller="userCtrl">
	<div class="row">
		<div class="col-xs-5 col-md-3">
			<a href="/#/" class="logo" title="POW! Comic Book Manager">
				<img src="../assets/svg/logo.svg" alt="POW! Comic Book Manager" />
		    <h1>Comic Book Manager</h1>
		  </a>
		</div>
		<div class="col-xs-7 col-md-9">
			<nav class="navbar navbar-top">
	      <ul class="nav navbar-nav navbar-right">
	      	<li><button class="btn btn-link" role="button" ng-click="openModal('search')"><i class="fa fa-fw fa-search"></i></button></li>
	      	<li class="btn-group user-profile" uib-dropdown>
	      		<a id="profileButton" role="button" aria-haspopup="true" aria-expanded="false" uib-dropdown-toggle>
	      			<img ng-src="{{userMeta.avatar || '../assets/images/avatar-deadpool.png'}}" alt="" class="img-circle"  width="40" />
	      			<span class="hidden-xs hidden-sm">{{userMeta.firstName || 'User'}}</span>
	      			<i class="fa fa-angle-down"></i>
	      		</a>
            <ul class="dropdown-menu" uib-dropdown-menu role="menu" aria-labelledby="profileButton">
              <li class="menuitem" role="menuitem"><a href="#">About</a></li>
	            <li class="menuitem" role="menuitem"><a href="#">Bugs</a></li>
	            <li role="separator" class="divider"></li>
	            <li class="menuitem" role="menuitem"><a href="#">Logout</a></li>
            </ul>
          </li>
	      </ul>
			</nav>
			<nav class="navbar navbar-bottom" role="navigation">
				<ul class="nav navbar-nav">
					<li><a href="/#/">Dashboard</a></li>
					<li><a ng-href="/#/profile/{{user.userId}">Collection</a></li>
					<li><a href="/#/feed">User Feed</a></li>
					<li><a href="/#/settings">Settings</a></li>
      	</ul>
			</nav>
			<div class="add-button-container">
				<button class="btn btn-link btn-add" role="button"><i class="fa fa-fw fa-plus"></i></button>
			</div>
		</div>
	</div>
</header>