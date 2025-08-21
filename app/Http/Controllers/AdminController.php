<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        // Logic for the admin home page
        if(Auth::id()){
            $usertype = Auth::user()->usertype;
            if($usertype == 'user'){
                $posts = Post::all();
                return view('home.homepage', compact('posts')); // Kirim $posts
        }
            else if($usertype == 'admin'){
                return view('admin.index');
        }
        }
        else{
            $posts = Post::all();
            return view('home.homepage', compact('posts'));
        }
    }
    public function post_page()
    {
        // Logic for the post page
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 'admin') {
                return view('admin.post_page');
            } else {
                return redirect()->route('home'); // arahkan ke dashboard/user home
            }
        } else {
            return redirect()->route('login'); // arahkan ke halaman login
        }
    }
    public function add_post(Request $request)
    {
        // Logic to handle adding a post
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new \App\Models\Post();
        $post->title = $request->title;
        $post->description = $request->description;
        /*if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('images', 'public');
        }*/
        $image=$request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        } else {
            $post->image = null; // Handle case where no image is uploaded
        }
        
        $post->user_id = Auth::id();
        $post->post_status = 'active'; // Default status
        $post->name = Auth::user()->name; // Assuming you want to store the name of the user
        $post->usertype = Auth::user()->usertype; // Assuming you want to store usertype
        $post->save();

        return redirect()->back()->with('massage', 'Post added successfully!');
    }
    public function show_post()
    {
        // Logic to show posts
        if (Auth::check()) {
            $posts = Post::all();// Retrieve all posts
            return view('admin.show_post', compact('posts'));
        } else {
            return redirect()->route('login'); // arahkan ke halaman login
        }
    }
    public function delete_post($id)
    {
        // Logic to delete a post
        $post = Post::find($id);
        
        $post->delete();// Delete the post
        return redirect()->back()->with('massage', 'Post deleted successfully!');// Redirect back with success message
        
    }
    public function edit_post($id)
    {
        // Logic to edit a post
        $post = Post::find($id);
        
        return view('admin.edit_post', compact('post')); // Return the edit view with the post data
       
    }
    public function update_post(Request $request, $id)
    {
        // Logic to update a post
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);// Validate the request data

        $post = Post::find($id); // Find the post by ID
        $post->title = $request->title;// Update the title
        $post->description = $request->description;// Update the description

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }// If no new image is uploaded, keep the existing one

        $post->save();// Save the updated post

        return redirect()->route('show_post')->with('update', 'Post updated successfully!');// Redirect to the show post page with success message
    }
    public function accept_post($id)
    {
        // Logic to accept a post
        $post = Post::find($id);
        if ($post) {
            $post->post_status = 'active'; // Set the post status to active
            $post->save(); // Save the changes
            return redirect()->back()->with('massage', 'Post accepted successfully!'); // Redirect back with success message
        } else {
            return redirect()->back()->with('error', 'Post not found!'); // Redirect back with error message if post not found
        }
    }

    public function reject_post($id)
    {
        // Logic to reject a post
        $post = Post::find($id);
        if ($post) {
            $post->post_status = 'rejected'; // Set the post status to rejected
            $post->save(); // Save the changes
            return redirect()->back()->with('massage', 'Post rejected successfully!'); // Redirect back with success message
        } else {
            return redirect()->back()->with('error', 'Post not found!'); // Redirect back with error message if post not found
        }
    }
    public function admin_profile()
    {
        $admin = Auth::user(); // Ambil user yang sedang login
        return view('admin.profile', compact('admin')); // Tampilkan halaman profile admin
    }
}
