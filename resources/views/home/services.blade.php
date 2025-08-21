<div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Blog Posts </h1>
            <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
            <div class="services_section_2">
               <div class="row justify-content-center">
                  
                  @foreach($posts as $item)

                  <div class="col-md-4 d-flex flex-column align-items-center mb-4">
                     <div>
                        <img src="postimage/{{$item->image}}" class="services_img img-fluid" style="max-height:200px; object-fit:cover;">
                     </div>
                     <h4 class="mt-2">{{$item->title}}</h4>
                     <p>Post by <b>{{$item->name}}</b></p>

                     <div class="btn_main"><a href="{{url('post_detail', $item->id)}}">Read More</a></div>
                  </div>
                  
                  @endforeach
               </div>
            </div>
         </div>
      </div>