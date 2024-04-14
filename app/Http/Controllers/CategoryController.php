<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Http\Requests\Admin\CategoryFormRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('dashboard.Category' , compact('category'));
        
    }
    public function create()
    {
        return view('dashboard.add-Category');
        
    }
    public function store(CategoryFormRequest $request)
    {
        
        $data = $request->validated();

        $category = new Category;
        $category->name=$data['name'];
        $category->slug=Str::slug($data['slug']);
        $category->description=$data['description'];

        if($request->hasfile('image')){
            $file = $request ->file('image');
            $filename = time() .'.'.$file->getClientOriginalExtension();
            $file->move('uploads/category/' , $filename);
            $category->image = $filename;
        }
        $category->meta_title=$data['meta_title'];
        $category->meta_description=$data['meta_description'];
        $category->meta_keywords=$data['meta_keywords'] ?? '';
        $category->navbar_status=$request->navbar_status==true ? '1':'0';
        $category->status=$request->status==true ? '1':'0';
        $category->created_by=Auth::user()->id;
        $category->save();

        return redirect()->route('Category.index')->with('success', 'Category created successfully');
    }
    public function edit($category_id)
    {
        $category = Category::find($category_id);
        return view('dashboard.edit-Category', compact('category'));
        
    }
    public function update(CategoryFormRequest $request, $category_id)
    {
        $data = $request->validated();
    
        $category = Category::find($category_id);
        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
    
            // Check if the category already has an image
            if ($category->image) {
                // If it does, delete the old image
                $oldImagePath = public_path('uploads/category/' . $category->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            // Upload the new image
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }
    
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keywords = $data['meta_keywords'] ?? '';
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->update(); // Use update() to update the category record
    
        return redirect()->route('Category.index')->with('success', 'Category Updated successfully');
    }
    public function destroy(Request $request)
    {
        $category = Category::find($request->category_delete_id);
    
        if (!$category) {
            return redirect()->route('Category.index')->with('error', 'Category not found.');
        }
    
        // Check if the category has an associated image and delete it
        if ($category->image) {
            $imagePath = public_path('uploads/category/' . $category->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        $category->delete(); // Delete the category record from the database
    
        return redirect()->route('Category.index')->with('success', 'Category deleted successfully');
    }
    
}
