<!DOCTYPE html>
<html>
	<head>
		<title>Author's and Books</title>
		{{ HTML::style('css/bootstrap.css'); }}
		{{ HTML::style('css/dashboard.css'); }}
		{{ HTML::style('css/font-awesome.css'); }}
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
		            <li><a href="{{ URL::to('users/account') }}">My Account</a></li>

		            <li class="divider"></li>
		            @if(Auth::check())
		      			<li><a href="{{ URL::to('users/logout') }}">Logout</a></li>
		      		@endif
		          </ul>
		        </li>

		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manager Actions <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="{{ URL::to('users/list') }}">Users</a></li>
		            <li><a href="{{ URL::to('courses/list') }}">Courses</a></li>
		            <li class="divider"></li>
		            <li><a href="{{ URL::to('users/dashboard') }}">Dashboard</a></li>
		          </ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

		@if(Session::has('message'))
			<div class="alert alert-success">
				<p>{{ Session::get('message') }}</p>
			</div>
		@endif
		@yield('content')
	</body>
</html>