<html>

	<head>
    	
     {{ HTML::style('/css/styles.css'); }}
    
    </head>

    <body>
        <h1>iSpyGolf V2</h1>
        @yield('content')<br>
        @yield('lower-content')
    </body>
</html>