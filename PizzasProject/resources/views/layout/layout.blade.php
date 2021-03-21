<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Fashion Shop</title>
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
</head>
<body>
        <!--Main Navigation-->
<header>

    <nav class="navbar navbar-expand-lg navbar-dark indigo scrolling-navbar">
      <a class="navbar-brand" href="#"><strong>Online Shopping</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="{{route("home")}}">Home</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{route("order")}}">Yours Orders</a>
          </li>
          @endauth
        </ul>
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a class="nav-link" href="https://www.facebook.com/sya8ahn" title="Waatkalay Online Fashion Shop"><i class="fab fa-facebook-f"></i></a>
          </li>
          @guest
            <li class="nav-item">
                <a class="nav-link" href="{{route("login")}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("register")}}">Register</a>
             </li>
          @endguest
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{route("logout")}}">Logout</a>
          </li>
          @endauth

      </div>
    </nav>

  </header>
  <!--Main Navigation-->


    @yield('content')





<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

</body>
</html>
