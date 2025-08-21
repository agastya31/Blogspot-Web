
@section('content')
<div class="container mt-5">
    <div class="card" style="max-width: 400px; margin: auto;">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">User Profile</h4>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>User Type:</strong> {{ ucfirst($user->usertype) }}</p>
            <p><strong>Joined:</strong> {{ $user->created_at->format('d M Y') }}</p>
        </div>
    </div>
</div>
@endsection