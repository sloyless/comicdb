<!-- Site wrapper begins -->
<div class="header-wrapper" ng-controller="rootController">
	<header id="mainHeader" role="banner" class="container-fluid">
		<div class="row">
			<div class="col-xs-5 col-md-3">
				<a href="/#/" class="logo text-center" title="POW! Comic Book Manager">
					<img src="../assets/svg/logo.svg" alt="POW! Comic Book Manager" />
			    <h1 class="font-bangers">Comic Book Manager</h1>
			  </a>
			</div>
			<div class="col-xs-7 col-md-9 nav-content font-raleway">
				<nav class="navbar navbar-default navbar-top">
		      <ul class="nav navbar-nav navbar-right">
		      	<li><button class="btn btn-link btn-search" role="button" ng-click="openModal('search')"><i class="fa fa-search"></i></button></li>
		      	<li class="btn-group user-profile" uib-dropdown>
		      		<a id="profileButton" role="button" aria-haspopup="true" aria-expanded="false" uib-dropdown-toggle>
		      			<img ng-src="{{userMeta.avatar || '../assets/images/avatar-deadpool.png'}}" alt="" class="img-circle"  width="40" />
		      			<span class="hidden-xs hidden-sm">{{userMeta.firstName || 'User'}}</span>
		      			<i class="fa fa-angle-down"></i>
		      		</a>
	            <ul class="dropdown-menu" uib-dropdown-menu role="menu" aria-labelledby="profileButton">
	              <li class="menuitem" ng-class="{active: $route.current.activetab == 'about'}" role="menuitem"><a href="#">About</a></li>
		            <li class="menuitem" role="menuitem"><a href="https://github.com/asanchez78/comicdb/issues">Bugs</a></li>
		            <li role="separator" class="divider"></li>
		            <li class="menuitem" role="menuitem"><a ng-click="logout()">Logout</a></li>
	            </ul>
	          </li>
		      </ul>
				</nav>
				<nav class="navbar navbar-default navbar-bottom hidden-xs hidden-sm" role="navigation">
					<ul class="nav navbar-nav text-uppercase">
						<li ng-class="{active: $route.current.activetab == 'dashboard'}"><a href="/#/"><i class="fa fa-tachometer"></i> Dashboard</a></li>
						<li ng-class="{active: $route.current.activetab == 'profile'}"><a ng-href="/#/profile/{{userMeta.userName}}"><i class="fa fa-archive"></i> Collection</a></li>
						<li ng-class="{active: $route.current.activetab == 'feed'}"><a href="/#/feed"><i class="fa fa-users"></i> User Feed</a></li>
						<li ng-class="{active: $route.current.activetab == 'settings'}"><a href="/#/settings"><i class="fa fa-cog"></i> Settings</a></li>
	      	</ul>
				</nav>
				<div class="add-button-container hidden-xs hidden-sm">
					<button class="btn btn-link btn-add" role="button" ng-click="isCollapsed = !isCollapsed"><i class="fa fa-plus"></i></button>
				</div>
			</div>
		</div>
	</header>
	<header id="mobileMenu" role="banner" class="container-fluid hidden-md hidden-lg">
		<nav class="navbar navbar-default" role="navigation">
			<ul class="nav navbar-nav">
				<li ng-class="{active: $route.current.activetab == 'dashboard'}"><a href="/#/"><i class="fa fa-fw fa-tachometer"></i> Dashboard</a></li>
				<li ng-class="{active: $route.current.activetab == 'profile'}"><a ng-href="/#/profile/{{userMeta.userName}}"><i class="fa fa-fw fa-archive"></i> Collection</a></li>
				<li class="add-button-container">
					<button class="btn btn-link btn-add" role="button" ng-click="isCollapsed = !isCollapsed"><i class="fa fa-plus"></i></button>
				</li>
				<li ng-class="{active: $route.current.activetab == 'feed'}"><a href="/#/feed"><i class="fa fa-fw fa-users"></i> User Feed</a></li>
				<li ng-class="{active: $route.current.activetab == 'settings'}"><a href="/#/settings"><i class="fa fa-fw fa-cog"></i> Settings</a></li>
    	</ul>
		</nav>
	</header>
	<div class="add-menu-container" uib-collapse="isCollapsed">
		<button class="btn btn-link text-center" role="button" ng-click="openModal('add-issue')">
			<i class="fa fa-fw fa-hashtag"></i>
			Add issues
		</button>
		<button class="btn btn-link text-center" role="button" ng-click="openModal('add-series')">
			<i class="fa fa-fw fa-folder-open-o"></i>
			Add series
		</button>
	</div>
</div>