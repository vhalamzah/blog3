
]<!DOCTYPE html>
<html lang="en">
  
<head> 
@include('partials._head')
</head>

<body>
  
   @include('partials._nav')

    <div class="container">
        
    @include('partials._messages')
    {{Auth::check() ? "logged in" : "logged out"}} 
  
    @yield('content')
 
    @include('partials._footer')

    @include('partials._javascript')

</body>
</html>