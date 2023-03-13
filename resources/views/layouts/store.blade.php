<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body style="overflow-x: hidden;">
  <header class="p-3 fixed-top text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="{{route('main')}}" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            Store
        </a> 
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{route('userPosts',['id'=>Auth::id()])}}" class="nav-link px-2 text-white">My posts</a></li>
          <li><a href="{{route('showBasket')}}" class="nav-link px-2 text-white">Cart</a></li>
          <li><a href="{{route('showAddForm')}}" class="nav-link px-2 text-white">Add offer</a></li>
          <li><a href="{{route('showFilterForm')}}" class="nav-link px-2 text-white">Filter</a></li>
        </ul>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 justify-content-center" role="search" action="{{route('main')}}" method="POST">
          @csrf
          <input type="search" name="search" class="form-control form-control-dark " placeholder="Search" aria-label="Search">
        </form>

        <div class="text-end">
          <a href="{{route('signInForm')}}"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
          <a href="{{route('signUpForm')}}"><button type="button" class="btn btn-warning">Sign-up</button></a>
        </div>
        
      </div>
    </div>
  </header>
  <div style="margin-top: 75px;">
    @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f5970f498a.js" crossorigin="anonymous"></script>
  </body>
</html>