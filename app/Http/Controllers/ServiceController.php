<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ServiceFormRequest;

class ServiceController extends Controller
{
    Public function index(){
        // $service = Service::all();
        $service = Service::with('ServiceCategory')->get();
        return view('dashboard.Services.index', compact('service'));
    }
    Public function create(){
        $serviceCategories = ServiceCategory::get();
        return view('dashboard.Services.add-service', compact('serviceCategories'));
    }
    public function store(ServiceFormRequest $request)
    {
       
        $validatedServiceData = $request->validated();
    
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
    
            $service = new Service();
            $service->category_id = $validatedServiceData['category_id'];
            $service->name = $validatedServiceData['name'];
            $service->slug = $validatedServiceData['slug'];
            $service->image = $imageName; 
            $service->description = $validatedServiceData['description'];
    
            $service->save();

            return redirect()->route('Service.index')->with('success', 'Service created successfully');
        }
    

        return back()->with('error', 'Please upload an image for the service.');
    }
    public function edit($id)
{
    
    $service = Service::find($id);


    if (!$service) {

        return redirect()->route('Service.index')->with('error', 'Service not found');
    }

    $serviceCategories = ServiceCategory::get();


    return view('dashboard.Services.edit-service', compact('service', 'serviceCategories'));
}

public function update(ServiceFormRequest $request, $id)
{
    // Validate the request using the ServiceFormRequest rules
    $validatedServiceData = $request->validated();

    $service = Service::find($id);

    if (!$service) {
        return redirect()->route('Service.index')->with('error', 'Service not found');
    }

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);

        $service->category_id = $validatedServiceData['category_id'];
        $service->name = $validatedServiceData['name'];
        $service->slug = $validatedServiceData['slug'];
        $service->image = $imageName;
        $service->description = $validatedServiceData['description'];

    } else {
        // Handle the case where no new image is provided
        $service->category_id = $validatedServiceData['category_id'];
        $service->name = $validatedServiceData['name'];
        $service->slug = $validatedServiceData['slug'];
        $service->description = $validatedServiceData['description'];
    }

    $service->save();

    return redirect()->route('Service.index')->with('success', 'Service updated successfully');
}
public function destroy($id)
{
    $service = Service::find($id);

    if (!$service) {
        return redirect()->route('Service.index')->with('error', 'Service not found');
    }

    $service->delete();

    return redirect()->route('Service.index')->with('success', 'Service deleted successfully');
}

    
}
