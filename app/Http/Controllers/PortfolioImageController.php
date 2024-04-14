<?php

namespace App\Http\Controllers;
use App\Models\PortfolioCatagory;
use App\Models\PortfolioImage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\PortfolioImageFormRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PortfolioImageController extends Controller
{
    public function index(){
        $Port_images = PortfolioImage::all();
        return view('dashboard.Portfolio_gallery.index', compact('Port_images'));
    }
    public function create(){
        $Port_category= PortfolioCatagory::get();
        return view('dashboard.Portfolio_gallery.create', compact('Port_category') );
    }
    public function store(PortfolioImageFormRequest $request){

        $validatedData = $request->validated();
        

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('port_images', 'public');

            $validatedData['image'] = $imagePath;
        }
    
 
        $portfolioImage = new PortfolioImage();

        $portfolioImage->port_id = $validatedData['port_id'];
        $portfolioImage->name = $validatedData['name'];
        $portfolioImage->slug = Str::slug($validatedData['slug']);
        $portfolioImage->image = $validatedData['image'] ?? null; 
        $portfolioImage->description = $validatedData['description'];
        $portfolioImage->meta_title = $validatedData['meta_title'];
        $portfolioImage->meta_description = $validatedData['meta_description'];
        $portfolioImage->meta_keywords = $validatedData['meta_keywords'];
        $portfolioImage->created_by = Auth::id(); 
    

        $portfolioImage->save();
    

        return redirect()->route('Portfolio_gallery.index')->with('message', 'Portfolio Image added Successfully');
    }
    public function edit($id){
        $portfolioImage = PortfolioImage::findOrFail($id);
        $Port_category= PortfolioCatagory::get();
        return view('dashboard.Portfolio_gallery.edit', compact('portfolioImage', 'Port_category'));
    }
    public function update(PortfolioImageFormRequest $request, $id){
        $validatedData = $request->validated();
        
        $portfolioImage = PortfolioImage::findOrFail($id);
        
        $portfolioImage->port_id = $validatedData['port_id'];
        $portfolioImage->name = $validatedData['name'];
        $portfolioImage->slug = Str::slug($validatedData['slug']);
        $portfolioImage->description = $validatedData['description'];
        $portfolioImage->meta_title = $validatedData['meta_title'];
        $portfolioImage->meta_description = $validatedData['meta_description'];
        $portfolioImage->meta_keywords = $validatedData['meta_keywords'];
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('port_images', 'public');
            $portfolioImage->image = $imagePath;
        }
        
        $portfolioImage->save();
        
        return redirect()->route('Portfolio_gallery.index')->with('message', 'Portfolio Image updated Successfully');
    }
    public function destroy($id){
        $portfolioImage = PortfolioImage::findOrFail($id);
        $portfolioImage->delete();
    
        return redirect()->route('Portfolio_gallery.index')->with('message', 'Portfolio Image deleted Successfully');
    }
}
