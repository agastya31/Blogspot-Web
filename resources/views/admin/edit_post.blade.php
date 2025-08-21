<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
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
        
        <h1 class="post-title" >Update Post</h1>
        <form action="{{url('update_post', $post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="div_center">
                    <label for="">Post Title</label>
                    <input type="text" name="title" value="{{$post->title}}">
                </div>
                <div class="div_center">
                    <label for="">Post Description</label>
                    <textarea name="description" id="">{{$post->description}}</textarea>
                </div>
                <div>
                    <img src="/postimage/{{$post->image}}" alt="" style="width: 200px; height: 200px; margin:auto;">
                </div>
                <div class="div_center">
                    <label for="">Update Old Image</label>
                    <input type="file" name="image">
                </div>
                
                <div class="div_center">
                    <input type="submit" value="Update Post" class="btn btn-primary" style="margin-top: 20px;">
                </div>
        </form>
    </div>
    <!-- JavaScript files-->
    @include('admin.footer')
    
  </body>
</html>