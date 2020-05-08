 <!DOCTYPE html>
 <html lang="en">

 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="des1cription" content="">
   <meta name="author" content="">

   <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Bootstrap core CSS -->
   <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">

   <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 </head>

 <body>

   <div class="d-flex" id="wrapper">

     <!-- Sidebar -->
     <div class="bg-light border-right" id="sidebar-wrapper">

       <img src="img/user.png" style="width:50%; position: inherit" class="image-logos"><br><br>
       <div class="sidebar-heading">Full Name </div>
       <div class="sidebar-heading">User </div>

       <div class="list-group list-group-flush margin-top10">
         <a href="#" class="list-group-item list-group-item-action bg-light"> <i class="fa fa-windows"> Residence</i>
         </a>
         <a href="#" class="list-group-item list-group-item-action bg-light"> <i class="fa fa-user-circle"> Applicant
           </i></a>
         <a href="#" class="list-group-item list-group-item-action bg-light"> <i class="fa fa-times-circle"> logout
           </i></a>
       </div>
     </div>
     <!-- /#sidebar-wrapper -->

     <!-- Page Content -->
     <div id="page-content-wrapper">

      <div class="jumbotron" style="height: 160px">
        <img src="img/menu.png" alt="menu" id="menu-toggle">
        <h2>MICRO HOUSING</h2>
        <div>
          <span>Filter : </span>
          <div class="btn-group margin-left2" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-secondary">All</button>
            <button type="button" class="btn btn-secondary">Availability</button>
          </div>
        </div>
      </div>
   
      <div class="container">
        <div class="row">
          
           <div class="col-12 col-md-4 px-3 mb-1">
             <div class="card">
               <img class="card-img image-logos margin-top10" style="width: 50%; position: inherit; margin-left: 20%;"
                 src="img/photo.png" alt="Card image cap">
               <div class="card-body">
                 <h6 class="card-title margin-top5">Name Residence</h6>
                 <h6 class="card-text margin-top5">Bio</h6>
               </div>
             </div>
           </div>

           <div class="col-12 col-md-4 px-3 mb-1">
             <div class="card">
               <img class="card-img image-logos margin-top10" style="width: 50%; position: inherit; margin-left: 20%;"
                 src="img/photo.png" alt="Card image cap">
               <div class="card-body">
                 <h6 class="card-title margin-top5">Name Residence</h6>
                 <h6 class="card-text margin-top5">Bio</h6>
               </div>
             </div>
           </div>

           <div class="col-12 col-md-4 px-3 mb-1">
             <div class="card">
               <img class="card-img image-logos margin-top10" style="width: 50%; position: inherit; margin-left: 20%;"
                 src="img/photo.png" alt="Card image cap">
               <div class="card-body">
                 <h6 class="card-title margin-top5">Name Residence</h6>
                 <h6 class="card-text margin-top5">Bio</h6>
               </div>
             </div>
           </div>

        </div>

         <div class="margin-top2">
           <nav aria-label="Page navigation example">
             <ul class="pagination justify-content-center">
               <li class="page-item disabled">
                 <a class="page-link" href="#" tabindex="-1">Previous</a>
               </li>
               <li class="page-item"><a class="page-link" href="#">1</a></li>
               <li class="page-item"><a class="page-link" href="#">2</a></li>
               <li class="page-item"><a class="page-link" href="#">3</a></li>
               <li class="page-item">
                 <a class="page-link" href="#">Next</a>
               </li>
             </ul>
           </nav>
         </div>
      </div>

       <!-- FOOTER -->
       <div class="container-fluid" style="background-color: black; padding: 15px">
         <h6 style="color: white">Contact Us</h6>
         <div class="row" style="text-align: center;">

           <div class="col-12 col-md-4 padding-lr5 padding-tb2">
             <div class="card">
               <i class="fa fa-envelope" style="font-size: 85px; text-align: center"> </i>
               <div class="card-body">
                 <h6 class="card-title">email@no-reply.com</h6>
               </div>
             </div>
           </div>

           <div class="col-12 col-md-4 padding-lr5 padding-tb2">
             <div class="card">
               <i class="fa fa-map-marker" style="font-size: 85px; text-align: center"> </i>
               <div class="card-body">
                 <h6 class="card-title">stikom Bali</h6>
               </div>
             </div>
           </div>

           <div class="col-12 col-md-4 padding-lr5 padding-tb2">
             <div class="card">
               <i class="fa fa-phone" style="font-size: 85px; text-align: center"> </i>
               <div class="card-body">
                 <h6 class="card-title">+6289999999999</h6>
               </div>
             </div>
           </div>
           <div></div>
           <br>
           <br>
         </div>

       </div>
       <!-- /#wrapper -->
     </div>

     <!-- Bootstrap core JavaScript -->
     <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
     <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

     <!-- Menu Toggle Script -->
     <script>
       $("#menu-toggle").click(function (e) {
         e.preventDefault();
         $("#wrapper").toggleClass("toggled");
       });
     </script>

 </body>

 </html>