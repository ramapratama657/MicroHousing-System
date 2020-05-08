 <!DOCTYPE html>
 <html lang="en">

 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="des1cription" content="">
   <meta name="author" content="">

   <title></title>

   <!-- Bootstrap core CSS -->
   <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet">

   <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 </head>

 <body>

   <div class="d-flex" id="wrapper">

     <!-- Page Content -->
     <div id="page-content-wrapper">

       <div class="jumbotron" style="height: 120px">
         <h2> <center> MICRO HOUSING</center> </h2>
       </div>

       <div class="container" >
        @yield('content')
      </div>
     </div>

     <!-- Bootstrap core JavaScript -->
     <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
     <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}')"></script>

     <!-- Menu Toggle Script -->
     <script>
       $("#menu-toggle").click(function (e) {
         e.preventDefault();
         $("#wrapper").toggleClass("toggled");
       });
     </script>

 </body>

 </html>