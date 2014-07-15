<!DOCTYPE html>
<html>
	<head>
		<title>Author's and Books</title>
		{{ HTML::style('css/bootstrap.css'); }}
		{{ HTML::style('css/login.css'); }}
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
		      <ul class="nav navbar-nav">

		      	@if(Auth::guest())
		      	<li><a href="{{ URL::to('users/login') }}">Login</a></li>
		        @endif
		      </ul>

		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>



		@if(Session::has('message'))
			<p>{{ Session::get('message') }}</p>
		@endif
		@yield('content')
	</body>
</html>