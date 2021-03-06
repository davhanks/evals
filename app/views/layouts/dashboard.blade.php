<!DOCTYPE html>
<html>
	<head>
		<title>{{ $title }}</title>
		{{ HTML::style('css/bootstrap.css'); }}
		{{ HTML::style('css/dashboard.css'); }}
		{{ HTML::style('css/font-awesome.css'); }}
		{{ HTML::style('css/temperature.css'); }}
		{{ HTML::style('css/settings.css'); }}
		{{ HTML::style('css/toggle.css'); }}
		{{ HTML::style('css/tests/newTest.css'); }}
		{{ HTML::style('css/courses/viewCourse.css'); }}
		{{ HTML::script('js/jquery.min.js'); }}
		{{ HTML::script('js/bootstrap.js'); }}
		
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


			


	</head>
	<body>
		<nav class="navbar navbar-default" role="navigation">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Evals</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      

		      <ul class="nav navbar-nav navbar-right">
		        
		      	<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		          	@if(Auth::check())
		          	{{ Auth::user()->first_name }} 
		          	@else
		          	User
		          	@endif
		          	<span class="caret"></span>
		          </a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="{{ URL::to('users/dashboard') }}"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
		            <li><a href="{{ URL::to('users/settings') }}"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>

		            <li class="divider"></li>
		            @if(Auth::check())
		      			<li><a href="{{ URL::to('users/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		      		@endif
		          </ul>
		        </li>

		        @if(Auth::user()->is_superuser())
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manager Actions <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="{{ URL::to('users/list') }}"><span class="glyphicon glyphicon-user"></span> Users</a></li>
		            <li><a href="{{ URL::to('courses/list') }}"><span class="glyphicon glyphicon-th-list"></span> Courses</a></li>
		            <li class="divider"></li>
		            <li><a href="{{ URL::to('users/dashboard') }}"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
		          </ul>
		        </li>
		        @endif
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
			
		@yield('content')
		{{ HTML::script('js/weather.js'); }}
		{{ HTML::script('js/settings/settings.js'); }}
		{{ HTML::script('js/courses/viewCourse.js'); }}
	</body>
</html>