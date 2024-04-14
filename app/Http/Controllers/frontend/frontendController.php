<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Category;
use App\Models\Profile;
use App\Models\{ServiceCategory, PortfolioCatagory, PortfolioImage};
class frontendController extends Controller
{
    public function index(){
        $all_posts = Posts::where('status', '0')->get();
        $profile = Profile::where('email', 'ijaveed302@gmail.com')->first();
        $serviceCategories = ServiceCategory::with('services')->get();

        $categories = PortfolioCatagory::all(); 
        $images = PortfolioImage::with('PortfolioCatagory')->get(); 

        // dd($profile);
        return view('FrontEnd.index', compact('all_posts', 'profile', 'categories', 'images', 'serviceCategories'));
    }
    public function viewPosts($category_slug, $post_slug){
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
    
        if (!$category) {
            return abort(404);
        }
    
        $post = Posts::where('category_id', $category->id)->where('slug', $post_slug)->where('status', '0')->first();
        
    
        if (!$post) {
            return abort(404);
        }
        return view('FrontEnd.post.view', compact('post',  'category'));
    }
    
    
}
