<!DOCTYPE html>
<html>
<head>
	<title>musics - @yield("page_title", "404 Page not found")</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta
      name="description"
      content="Music for musics"
    />
</head>
<body>

	<div id="app" class="web container">

		<header>
	      <div class="container header_items">
	        <div class="logo">
	          <a href="/">
	            <img src="https://us.napster.com/assets/runway_eu/logo_napster-4d9106cd259d52addcd76c53946ff00dc4583c1b12aa129f137884961e853273.png">
	          </a>
	        </div>
	        <div class="user">
	          <div class="user_authetications">
	            @auth
	            	<a href="/user/profile">Profile</a>
	            @else
	              	<a href="/user/auth">Log in</a>
	                <a href="/user/register">Register</a>
	            @endauth
	          </div>
	        </div>
	      </div>
	    </header>
		
		@yield("content")

	</div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="/js/app.js"></script>
</html>