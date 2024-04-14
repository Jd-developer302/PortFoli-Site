<?php

namespace App\Http\Controllers;
use App\Models\PortfolioCatagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\PortfolioCategoryFormRequest;
use Illuminate\Support\Str;
class PortfolioController extends Controller
{
    public function index()
    {
        $Port_category = PortfolioCatagory::all();
        return view('dashboard.Portfolio.index', compact('Port_category'));
    }
    public function create(){
        return view('dashboard.Portfolio.add_port_category');
    }

    public function store(PortfolioCategoryFormRequest $request)
    {
        $Port_data = $request->validated();

        $Port_category = new PortfolioCatagory;
        $Port_category->name = $Port_data['name'];
        $Port_category->slug=Str::slug($Port_data['slug']);
        $Port_category->description = $Port_data['description'];
        $Port_category->meta_title = $Port_data['meta_title'];
        $Port_category->meta_description = $Port_data['meta_description'];
        $Port_category->meta_keywords = $Port_data['meta_keywords'];
        $Port_category->created_by = Auth::user()->id;

        $Port_category->save();

        return redirect()->route('Portfolio_category.index')->with('message', 'Portfolio Category add Successfully');

    }
    public function edit($id){
        $portfolioCategory = PortfolioCatagory::findOrFail($id);
        return view('dashboard.Portfolio.edit_port_category', compact('portfolioCategory'));
    }
    public function update(PortfolioCategoryFormRequest $request, $id)
    {
        $Port_data = $request->validated();

        $Port_category = PortfolioCatagory::findOrFail($id);
        $Port_category->name = $Port_data['name'];
        $Port_category->slug = Str::slug($Port_data['slug']);
        $Port_category->description = $Port_data['description'];
        $Port_category->meta_title = $Port_data['meta_title'];
        $Port_category->meta_description = $Port_data['meta_description'];
        $Port_category->meta_keywords = $Port_data['meta_keywords'];

        $Port_category->save();

        return redirect()->route('Portfolio_category.index')->with('message', 'Portfolio Category updated successfully');
    }
    public function destroy($id)
    {
        $portfolioCategory = PortfolioCatagory::findOrFail($id);
        $portfolioCategory->delete();

        return redirect()->route('Portfolio_category.index')->with('message', 'Portfolio Category deleted Successfully');
    }
}
