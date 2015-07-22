<!DOCTYPE html>
<html lang="en">
  <head>

	@include('includes.head')
    
  </head>

  <body>
  
	@include('includes.header')
    
    @yield('searchbar')

	@yield('herobanner')
        
     <div class="container">
        
        @yield('content')
        
        
    </div><!-- /.container -->


	@include('includes.footer')
    
    
  </body>
</html>
