<!DOCTYPE html>
<html lang="en">
   <head>

      <!-- basic -->
       @include('home.homecss')
       <style>
        .post_deg {
            text-align: center;
            padding: 30px;
            background-color: #665f5fff;
        }
        .title_deg {
            font-size: 30px;
            font-weight: bold;
            padding: 15px;
            color: white;
        }
        .des_deg {
            font-size: 18px;
            font-weight: bold;
            padding: 15px;
            color: whitesmoke;
        }
        .post_image {
            width: 300px;
            height: 200px;
            padding: 10px;
            margin: auto;
        }
       </style>

   </head>
   <body>
        
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')

        @if(session()->has('massage'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('massage')}}
                
            </div>
        @endif

        @foreach($data as $data)
        <div class="post_deg">
            <img class="post_image" src="/postimage/{{$data->image}}" alt="">
            <h2 class="title_deg">{{$data->title}}</h2>
            <p class="des_deg">{{$data->description}}</p>

            <a onclick="return confirm('Are you sure you want to delete this post?');" href="{{url('delete_post/'.$data->id)}}" class="btn btn-danger">Delete</a>

            <a href="{{url('update_post/'.$data->id)}}" class="btn btn-primary">Update</a>
        </div>
</div>
        @endforeach
         
      
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