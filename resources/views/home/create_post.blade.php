<!DOCTYPE html>
<html lang="en">
   <head>

      <!-- basic -->
       @include('home.homecss')
        <style>
             .div_deg {
                text-align: center;
                padding: 50px;
             }
             .div_deg h1 {
                font-size: 30px;
                margin-bottom: 20px;
             }
             .div_deg p {
                font-size: 18px;
                margin-bottom: 30px;
             }
             .div_deg form {
                display: inline-block;
                text-align: left;
             }
             .div_deg input[type="text"],
             .div_deg textarea,
             .div_deg input[type="file"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
             }
             .div_deg input[type="submit"] {
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                border: none;
                cursor: pointer;
             }
             label{
                font-size: 18px;
                margin-bottom: 10px;
                display: inline-block;
                width: 200px;
                color: white;
             }
             </style>
   </head>
   <body>
    @include('sweetalert::alert')
    
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
      
      <!-- header section end -->
     <div class="div_deg">
        <h1 style="color: white;">Create Post</h1>
        <p>Fill in the details below to create a new post.</p>
        <form action="{{url('user_post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- CSRF token for security -->
            <div><label for="">Title</label>
                <input type="text" name="title" placeholder="Title">
            </div>
            <div><label for="">Description</label>
                <textarea name="description" id=""></textarea>
            </div>
            <div><label for="">Add Image</label>
                <input type="file" name="image" placeholder="Add Image">
            </div>
            <div>
                <input type="submit" value="Add Post">
            </div>
        </form>
     </div>
      <!-- footer section start -->
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