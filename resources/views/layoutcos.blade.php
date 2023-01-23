<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>@yield('title')</title>
 <link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/fontawesome.min.css">
 <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body> 
<div class="container">
 <div class="row">

 <ul class="navbar-nav ml-auto">
                     <!-- Authentication Links -->
                     @guest
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                     </li>
                     @if (Route::has('register'))
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                     </li>
                     @endif
                     @else
                     <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                           </form>
                        </div>
                     </li>
                     @endguest
                  </ul>
 
 <div class="col-lg-12 col-sm-12 col-12 main-section">
 <div class="dropdown">
 <button type="button" class="btn btn-info" data-toggle="dropdown">
 <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge
badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
 </button>
 <div class="dropdown-menu">
 <div class="row total-header-section">
 <div class="col-lg-6 col-sm-6 col-6">
 <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge
badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
 </div>
 <?php $total = 0 ?>
 @foreach((array) session('cart') as $id => $details)
 <?php $total += $details['price'] * $details['quantity'] ?>
 @endforeach
 <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
 <p>Total: <span class="text-info">{{ $total }} RON</span></p>
 </div>
 </div>
 @if(session('cart'))
 @foreach(session('cart') as $id => $details)
 <div class="row cart-detail">
 <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
 <img src="{{ $details['photo'] }}" width="100" height="100" />
 </div>
 <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
 <p>{{ $details['name'] }}</p>
 <span class="price text-info"> {{ $details['price'] }} RON</span> <span
class="count"> Quantity:{{ $details['quantity'] }}</span>
 </div>
 </div>
 @endforeach
 @endif
 <div class="row">
 <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
 <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View the cart</a>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
</div>
<div class="container page">
 @yield('content')
</div>
@yield('scripts')
</body>
</html>