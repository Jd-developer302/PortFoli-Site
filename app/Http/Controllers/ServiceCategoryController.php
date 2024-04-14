<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Http\Requests\Admin\ServicesCategoryFormRequest;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    Public function index(){
        $serviceCategories = ServiceCategory::all();
        return view('dashboard.Services_Category.index', compact('serviceCategories'));
    }
    Public function create(){
        return view('dashboard.Services_Category.add-services_category');
    }
    public function store(ServicesCategoryFormRequest $request){
        // Validate the incoming request using the form request
        $validatedService = $request->validated();

        $slug = Str::slug($validatedService['slug']);
        
        // Create a new ServiceCategory instance with the validated data
        $serviceCategory = new ServiceCategory([
            'name' => $validatedService['name'],
            'slug' => $slug
        ]);

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $serviceCategory->image = $imageName;
        }

        // Save the ServiceCategory to the database
        $serviceCategory->save();

        // Redirect to a success page or return a response
        return redirect()->route('Services_Category.index')
            ->with('success', 'Service Category created successfully');
    }
    public function edit($id) {
        // Find the ServiceCategory by its ID
        $serviceCategory = ServiceCategory::find($id);
    
        if (!$serviceCategory) {
            // Handle the case where the service category with the given ID was not found, e.g., show an error message or redirect to a 404 page.
        }
    
        return view('dashboard.Services_Category.edit-service_category', compact('serviceCategory'));
    }
    public function update(Request $request, $id) {
        // Find the ServiceCategory by its ID
        $serviceCategory = ServiceCategory::find($id);
    
        if (!$serviceCategory) {
            // Handle the case where the service category with the given ID was not found, e.g., show an error message or redirect to a 404 page.
        }
    
        // Validate the incoming request using the form request
        $validatedService = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example image validation
        ]);
    
        // Update the ServiceCategory instance with the validated data
        $serviceCategory->name = $validatedService['name'];
        $serviceCategory->slug=Str::slug($validatedService['slug']);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $serviceCategory->image = $imageName;
        }
    
        // Save the updated ServiceCategory to the database
        $serviceCategory->save();
    
        // Redirect to a success page or return a response
        return redirect()->route('Services_Category.index')
    ->with('success', 'Service Category updated successfully');
    }
    public function destroy($id) {
        // Find the ServiceCategory by its ID
        $serviceCategory = ServiceCategory::find($id);
    
        if (!$serviceCategory) {
            // Handle the case where the service category with the given ID was not found, e.g., show an error message or redirect to a 404 page.
        }
    
        // Delete the ServiceCategory
        $serviceCategory->delete();
    
        // Redirect to a success page or return a response
        return redirect()->route('Services_Category.index')
            ->with('success', 'Service Category deleted successfully');
    }
    
    
}
