<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortfolioCatagory;
use App\Models\PortfolioImage;

class GalleryController extends Controller
{
    public function index()
    {
        $oldestImage = PortfolioImage::orderBy('created_at', 'asc')->first();
        $latestImage = PortfolioImage::orderBy('created_at', 'desc')->first();

        $PortfolioImages = PortfolioImage::get();
        return view('FrontEnd.Portfolio.index', compact('oldestImage', 'latestImage', 'PortfolioImages'));
    }

    public function viewimage($slug)
    {
        
        $category = PortfolioCatagory::with('images')->where('slug', $slug)->firstOrFail();

       

        
        // $categoryImages = PortfolioImage::whereHas('category', function($query) use ($slug) {
        //     $query->where('slug', $slug);
        // })->get();

        return view('FrontEnd.Portfolio.viewimage', compact('category'));
    }
}
