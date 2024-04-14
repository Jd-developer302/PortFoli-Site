<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PostFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Storage;


class PostController extends Controller
{
    public function index(){
        $posts = Posts::all();
        return view('dashboard.Post.index', compact('posts'));
    }
    public function create(){
        $category = Category::where('status','0')->get();
        return view('dashboard.Post.add-Post', compact('category'));
    }
    public function store(PostFormRequest $request){
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }
        $post = new Posts;
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = Str::slug($data['slug']);
        $post->image = $data['image'];
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keywords = $data['meta_keywords'];
        $post->status = $request->status == true ? '1':'0';
        $post->created_by=Auth::user()->id;
        $post->save();

        return redirect()->route('Post.index')->with('success', 'Post Add successfully');
    }
    public function edit($post_id){
        $category = Category::where('status','0')->get();
        $post = Posts::find($post_id);

        return view('dashboard.Post.edit-Post',compact('post','category'));
    }

    public function update(PostFormRequest $request, $post_id){
        $data = $request->validated();
        $post = Posts::find($post_id);

        if ($request->hasFile('image')) {
            if ($post->image !== null && Storage::exists($post->image)) {
                Storage::delete($post->image);
            }     
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = Str::slug($data['slug']);
        $post->image = $data['image'];
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keywords = $data['meta_keywords'];
        $post->status = $request->status == true ? '1':'0';
        $post->created_by=Auth::user()->id;
        $post->update();

        return redirect()->route('Post.index')->with('success', 'Post Updated successfully');
    }
    public function destroy($post_id){
        $post = Posts::find($post_id);
    
        if (!$post) {
            return redirect()->route('Post.index')->with('error', 'Post not found.');
        }
        if ($post->image !== null && Storage::exists($post->image)) {
            Storage::delete($post->image);
        }
        
        $post->delete();
    
        return redirect()->route('Post.index')->with('success', 'Post deleted successfully');
    }
}
