<!DOCTYPE html>
<html lang="en">
  <head>

	@include('includes.maphead')
    
  </head>

  <body>
  
	@include('includes.header')

		@yield('map-search-row')

   		@yield('map-container')

	@include('includes.footer')
    
    
  </body>
</html>
