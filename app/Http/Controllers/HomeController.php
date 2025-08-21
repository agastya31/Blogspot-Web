<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Alert;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('post_status', '=', 'active')->get(); // Ambil semua post dengan status 'active'
        if (Auth::id()) {
            $usertype = Auth::user()->usertype; // Ambil tipe user (admin/user)
            if ($usertype == 'user') {
                return view('home.homepage', compact('posts'));
            } else if ($usertype == 'admin') {
                return view('admin.index');
            }
        }
        return view('home.homepage', compact('posts'));
    }

    public function homepage()
    {
        $posts = Post::where('post_status', '=', 'active')->get(); // Ambil semua post dengan status 'active'
        return view('home.homepage', compact('posts'));
    }

    public function post_detail($id)
    {
        $post = Post::where('id', $id)
                    ->where('post_status', 'active')
                    ->firstOrFail();
        return view('home.post_detail', compact('post'));
    }
    public function create_post()
    {
        
        return view('home.create_post');
        
    }
    public function user_post(Request $request)
    {
       
        

        // Logic to handle user post creation
        // Validate the request data

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
         // Ambil user yang sedang login
        $user= Auth()->user(); // Ambil user yang sedang login
        $userid = $user->id; // Ambil ID user
        $username = $user->name; // Ambil nama user
        $usertype = $user->usertype; // Ambil tipe user (admin/user)
        // Buat instance Post baru
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $userid; // Set user_id ke ID user yang sedang login
        $post->name = $username; // Set username ke nama user yang sedang login
        $post->usertype = $usertype; // Set usertype ke tipe user yang sedang login
        $post->post_status = 'pending'; // Set status post ke 'pending'

        $image = $request->image;
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('postimage'), $imageName);
            $post->image = $imageName; // Simpan path gambar
        }

        $post->save();
        Alert::success('Success', 'Post created successfully');
        // Redirect ke halaman home setelah berhasil membuat post
        // Anda bisa mengarahkan ke halaman yang sesuai
        return redirect()->route('home'); // Redirect ke halaman home setelah berhasil membuat post
    }
    public function my_post()
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = Post::where('user_id', $userid)
                    ->where('post_status', 'active')
                    ->get();
        return view('home.my_post', compact('data'));
    }
    public function delete_post($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        
        return redirect()->route('my_post')->with('massage', 'Post deleted successfully!');
    }
    public function update_post($id)
    {
        $post = Post::findOrFail($id); // Ambil post berdasarkan ID
        return view('home.update_post', compact('post')); // Tampilkan form update dengan data post
    }
    
    public function update_post_data(Request $request, $id)
    {
        $post = Post::findOrFail($id); // Ambil post berdasarkan ID

        // Validasi data yang diterima
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update data post
        $post->title = $request->title;
        $post->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('postimage'), $imageName);
            $post->image = $imageName; // Simpan path gambar
        }

        $post->save(); // Simpan perubahan ke database
        Alert::success('Success', 'Post updated successfully');
        
        // Redirect ke halaman my_post setelah berhasil mengupdate post
        return redirect()->route('home'); // Redirect ke halaman my_post setelah berhasil mengupdate post
    }

    public function profile()
    {
        $user = Auth::user(); // Ambil user yang sedang login
        return view('home.profile', compact('user')); // Tampilkan halaman profile dengan data user
    }



}