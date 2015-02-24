<!DOCTYPE html>
<html lang="en">
  <head>

	@include('includes.head')
    
  </head>

  <body>
  
	@include('includes.header')
    
    @yield('searchbar')

    <div class="container">

		@yield('content')

    </div><!-- /.container -->
   
   	@yield('smallbox')


	@include('includes.footer')
    
    
  </body>
</html>
