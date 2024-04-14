<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Posts;

class blogController extends Controller
{
    public function index($category_slug = null, $post_slug = null)
    {
       // Retrieve all posts
        $all_posts = Posts::where('status', '0')->get();

        $popular_posts = Posts::where('status', '0')->orderBy('views', 'desc') ->take(5) ->get();
      
        $post = null;
        if ($category_slug && $post_slug) {
            $category = Category::where('slug', $category_slug)->firstOrFail();
            $post = Posts::where('slug', $post_slug)->where('category_id', $category->id)->firstOrFail();
        }
    
        return view('FrontEnd.blog', compact('all_posts', 'post', 'popular_posts'));
    }
    
    public function viewCategoryPost(string $category_slug){
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();

        if (!$category) {
            // Handle the case where the category is not found, e.g., show a 404 page or redirect to a different page.
            return abort(404);
        }
        
        // Now you can safely use $category->id since it exists.
        $post = Posts::where('category_id', $category->id)->where('status', '0')->paginate(5);
        return view('FrontEnd.post.index', compact('post','category'));
    }
    // public function viewPosts($category_slug,  $post_slug){
    //     $category = Category::where('slug', $category_slug)->where('status', '0')->first();
    
    //     if (!$category) {
    //         // Handle the case where the category is not found, e.g., show a 404 page or redirect to a different page.
    //         return abort(404);
    //     }
    
    //     // Now you can safely use $category->id since it exists.
    //     $post = Posts::where('category_id', $category->id)->where('slug', $post_slug)->where('status', '0')->first();
    //     $latest_posts = Posts::where('category_id', $category->id)->where('status', '0')->orderBy('created_at', 'desc')->get()->take(10);
    //     if (!$post) {
    //         // Handle the case where the post is not found, e.g., show a 404 page or redirect to a different page.
    //         return abort(404);
    //     }
    
    //     return view('FrontEnd.post.view', compact('post', 'latest_posts'));
    // }
    public function viewPosts($category_slug, $post_slug){
    // Retrieve the category by slug and check its status
    $category = Category::where('slug', $category_slug)->where('status', '0')->firstOrFail();

    // Retrieve the specific post within the given category and check its status
    $post = Posts::where('category_id', $category->id)
        ->where('slug', $post_slug)
        ->where('status', '0')
        ->firstOrFail();

    // Retrieve the latest posts within the same category (excluding the current post)
    $latest_posts = Posts::where('category_id', $category->id)
        ->where('status', '0')
        ->where('id', '!=', $post->id) // Exclude the current post
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();

    return view('FrontEnd.post.view', compact('post', 'latest_posts'));
}

    
}
