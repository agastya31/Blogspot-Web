<!DOCTYPE html>
<html lang="en">
   <head>

      <!-- basic -->
       <base href="/public">
       @include('home.homecss')

   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
         
         <!-- banner section start -->
         
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- footer section start -->
       <div style="" class="col-md-12 d-flex flex-column align-items-center">
                     <div>
                        <img src="postimage/{{$post->image}}" class="services_img img-fluid" style="padding: 20px;">
                     </div>
                     <h1><b>{{$post->title}}</b></h1>
                     <h4>{{$post->description}}</h4>
                     <p>Post by <b>{{$post->name}}</b></p>
                  </div>
        
        


      @include('home.footer')
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>    
   </body>
</html>