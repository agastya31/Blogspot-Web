<!DOCTYPE html>
<html lang="en">
   <head>

   <base href="/public">
      <!-- basic -->
       @include('home.homecss')

    <style>
        .update_post_deg {
            text-align: center;
            padding: 30px;

        }
        .update_post_deg h1 {
            font-size: 30px;
            font-weight: bold;
            padding: 15px;
            color: white;
        }
        .update_post_deg form {
            max-width: 600px;
            margin: auto;
        }
        .update_post_deg input, .update_post_deg textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
        }
        .update_post_deg .img_deg {

            padding: 10px;
            margin: auto;
        }
        .title{
            font-size: 20px;
            font-weight: bold;
            color: black;
        }
    </style>
    
   </head>
   <body>
      @include('sweetalert::alert')
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')

        <h1>{{ $post->title }}</h1>

        <div class="update_post_deg">
            <form action="{{ url('update_post_data/'.$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" value="{{ $post->title }}" required>
                </div>
                <div>
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required>{{ $post->description }}</textarea>
                </div>
                <div>
                    <label for="image">Current Image:</label>
                    <img class="img_deg" src="/postimage/{{$post->image}}" alt="">
                </div>
                <div>
                    <label for="image">Change Image:</label>
                    <input type="file" id="image" name="image">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Update Post</button>
            </form>
        </div>

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