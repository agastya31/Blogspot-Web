<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .post-title
        {
            text-align: center;
            font-size: 30px;
            padding-top: 30px;
            padding-bottom: 20px;
            color: white;
        }
        .div_center
        {
            text-align: center;
            padding: 20px;
        }
        label{
            display: inline-block;
            width: 200px;
            text-align: right;
            margin-right: 10px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
        
      <!-- Sidebar Navigation end-->
        <div class="page-content">
           @if(session()->has('massage'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('massage') }}
            </div>
            @endif
            <!--@if(session()->has('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('error') }}
            </div>
            @endif -->


        <h1 class="post-title" >
            Add Post
        </h1>
        <div>
            <form action="{{url('add_post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_center">
                    <label for="">Post Title</label>
                    <input type="text" name="title" placeholder="Enter Post Title">
                </div>
                <div class="div_center">
                    <label for="">Post Description</label>
                    <textarea name="description" id=""></textarea>
                </div>
                
                <div class="div_center">
                    <label for="">Add Image</label>
                    <input type="file" name="image">
                </div>
                <div class="div_center">
                    <input type="submit" value="Add Post" class="btn btn-primary" style="margin-top: 20px;">
                </div>
            </form>
        </div>


        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.footer')
    
  </body>
</html>