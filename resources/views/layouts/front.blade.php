<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      
	<title>
		FSJES FORUM
	</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://bootswatch.com/3/paper/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
  <style type="text/css">
    html {
    position: relative;
    min-height: 100%;
}

body {
    margin: 0 0 100px;
    /* bottom = footer height */
  
}

footer {
    position: absolute;
    left: 0;
    bottom: 0;
    height: 80px;
    width: 100%;
    overflow: hidden;
}
  </style>

</head>
<body>
<div id="app">
@include('layouts.partials.navbar')


@yield('banner')
  <div class="container">
    
  @include('layouts.partials.error')

@include('layouts.partials.success ')

 <div class="row">

  @section('category')
   
 @include('layouts.partials.categories')

 @show
  
 <div class="col-md-9">
  <div class="main-content-heading"><h4>@yield('heading')</h4></div>
      <div class="content-wrap ">
      @yield('content') 
    </div>
  </div>

   </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="{{asset('js/main.js')}}"></script>

@yield('js')
@include('sweetalert::alert')

<footer style=" color: black; text-align: center; background: #DDDDDD;">
  <h5>2020 &copy; par : Hatim Alkah & Miss Kawtar </h5>
  <a href="#" class="fa fa-facebook"></a>
   <a href="#" class="fa fa-instagram"></a>
   <a href="#" class="fa fa-twitter"></a>
   <a href="mailto:tim8.alk8@gmail.com" target="_top" class="makerCss">Contactez nous</a>
</footer>

</body>


</html>