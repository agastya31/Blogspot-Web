<!DOCTYPE html>
<html>
  <head> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    @include('admin.css')
    <!-- Tambahkan Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .title_deg {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            color: #fff;
            padding: 20px;
        }
        .img_deg {
            border-radius: 10px;
            width: 70px;
            height: 70px;
            object-fit: cover;
        }
        .table-responsive {
            margin: 30px auto;
            width: 95%;
        }
        .badge-status {
            font-size: 1em;
        }
        /* Tambahan agar font di dalam tabel putih */
        .table,
        .table th,
        .table td {
            color: #fff !important;
            background-color: #222 !important;
        }
        .table thead th {
            background-color: #343a40 !important;
            color: #fff !important;
        }
        .badge-status {
            color: #fff !important;
        }
        .btn {
            color: #fff !important;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      @include('admin.sidebar')
      <div class="page-content">
        @if(session()->has('massage'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('massage') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
            </div>
        @endif
        @if(session()->has('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('update') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
            </div>
        @endif

        <h1 class="title_deg">All Post</h1>
        <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Post Title</th>
                    <th>Description</th>
                    <th>Post by</th>
                    <th>Status</th>
                    <th>UserType</th>
                    <th>Image</th>
                    <th>Delete</th>
                    <th>Edit</th>
                    <th>Accept</th>
                    <th>Reject</th>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $index => $post)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $post->title }}</td>
                <td style="max-width:200px; word-break:break-word;">{{ \Illuminate\Support\Str::limit($post->description, 50) }}</td>
                <td>{{ $post->name }}</td>
                <td>
                    @if($post->post_status == 'active')
                        <span class="badge badge-success badge-status">Active</span>
                    @elseif($post->post_status == 'pending')
                        <span class="badge badge-warning badge-status">Pending</span>
                    @elseif($post->post_status == 'rejected')
                        <span class="badge badge-danger badge-status">Rejected</span>
                    @else
                        <span class="badge badge-secondary badge-status">{{ ucfirst($post->post_status) }}</span>
                    @endif
                </td>
                <td>{{ ucfirst($post->usertype) }}</td>
                <td>
                    <img class="img_deg" src="/postimage/{{$post->image}}" alt="Post Image">
                </td>
                <td>
                    <a onclick="confirmation(event)" class="btn btn-danger btn-sm" href="{{url('delete_post', $post->id)}}">Delete</a>
                </td>
                <td>
                    <a class="btn btn-success btn-sm" href="{{url('edit_post', $post->id)}}">Edit</a>
                </td>
                <td>
                    <a href="{{url('accept_post', $post->id)}}" class="btn btn-primary btn-sm"
                        @if($post->post_status == 'active') style="pointer-events:none;opacity:0.6;" title="Already active" @endif>
                        Accept
                    </a>
                </td>
                <td>
                    <a onclick="rejectConfirmation(event)" class="btn btn-warning btn-sm"
                        @if($post->post_status == 'rejected') style="pointer-events:none;opacity:0.6;" title="Already rejected" @endif
                        href="{{url('reject_post', $post->id)}}">Reject</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
      </div>
    </div>
    @include('admin.footer')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var url = ev.currentTarget.getAttribute('href');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this post!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = url;
                } else {
                    swal("Your post is safe!");
                }
            });
        }

        function rejectConfirmation(ev) {
            ev.preventDefault();
            var url = ev.currentTarget.getAttribute('href');
            swal({
                title: "Are you sure you want to reject?",
                text: "This post will be marked as rejected.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willReject) => {
                if (willReject) {
                    window.location.href = url;
                } else {
                    swal("Post not rejected.");
                }
            });
        }
    </script>
  </body>
</html>