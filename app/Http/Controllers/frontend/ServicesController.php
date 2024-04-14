<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\Service;

class ServicesController extends Controller
{  
    public function index($slug) {
        // Fetch the category based on the provided slug
        $category = ServiceCategory::where('slug', $slug)->firstOrFail();

        // Retrieve services associated with the fetched category
        $services = $category->services;

        return view('FrontEnd.services.index', compact('category', 'services'));
    }
    
}
