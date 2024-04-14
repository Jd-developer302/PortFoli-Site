<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Profile;

class ProfilController extends Controller
{
    public function index()
    {
        $profiles = Profile::all(); // Assuming you have a Profile model

        return view('dashboard.home', compact('profiles'));
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            'sub_title' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'mobile_number' => 'required',
            'cv' => 'required',
            'description' => 'required',
        ]);

        if ($validator->passes()) {
            $profile = new Profile();
            $profile->name = $request->name;
            $profile->email = $request->email;
            $profile->title = $request->title;
            $profile->sub_title = $request->sub_title;
            $profile->phone_number = $request->phone_number;
            $profile->mobile_number = $request->mobile_number;
            $profile->address = $request->address;
            $profile->description = $request->description;

            // Upload image here
            if ($request->hasFile('image')) {
                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time() . '.' . $ext;
                $request->image->move(public_path() . '/uploads/profile/', $newFileName);
                $profile->image = $newFileName;
            }

            //upload cv here
            if ($request->hasFile('cv')) {
                $ext = $request->cv->getClientOriginalExtension();
                $newFileName = time() . '.' . $ext;
                $request->cv->move(public_path() . '/uploads/cvs/', $newFileName);
                $profile->cv = $newFileName;
            }

            $profile->save();

            $request->session()->flash('success', 'Profile added successfully.');

            return redirect()->route('Profiles.index');
        } else {
            return redirect()->route('Profiles.create')->withErrors($validator)->withInput();
        }
    }

    public function edit($id)
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return redirect()->route('Profiles.index')->with('error', 'Profile not found');
        }

        return view('dashboard.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'sub_title' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'mobile_number' => 'required',
            'description' => 'required',
        ]);

        if ($validator->passes()) {
            $profile = Profile::findOrFail($id);
            $profile->name = $request->name;
            $profile->email = $request->email;
            $profile->title = $request->title;
            $profile->sub_title = $request->sub_title;
            $profile->phone_number = $request->phone_number;
            $profile->mobile_number = $request->mobile_number;
            $profile->address = $request->address;
            $profile->description = $request->description;

            if ($request->hasFile('image')) {
                // Store the existing image's filename in $oldImage
                $oldImage = $profile->image;
            
                // Generate a new unique filename for the uploaded image
                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time() . '.' . $ext;
            
                try {
                    // Move the uploaded image to the desired location with the new filename
                    $request->image->move(public_path('uploads/profile'), $newFileName);
            
                    // Update the profile's image attribute with the new filename
                    $profile->image = $newFileName;
            
                    // Delete the old image file if it exists
                    if (!empty($oldImage)) {
                        $oldImagePath = public_path('uploads/profile/') . $oldImage;
                        if (File::exists($oldImagePath)) {
                            File::delete($oldImagePath);
                        }
                    }
                } catch (\Exception $e) {
                    // Handle any exceptions that may occur during file operations
                    return back()->with('error', 'An error occurred while updating the image.');
                }
            }
            
            // Upload cv here
            if ($request->hasFile('cv')) {
                $oldCV = $profile->cv; // Store the existing CV filename
                $ext = $request->cv->getClientOriginalExtension();
                $newFileName = time() . '.' . $ext;
                $request->cv->move(public_path('uploads/cvs/'), $newFileName);
                $profile->cv = $newFileName;

                // Delete the old CV file if it exists
                if (!empty($oldCV)) {
                    $oldCVPath = public_path('uploads/cvs/') . $oldCV;
                    if (File::exists($oldCVPath)) {
                        File::delete($oldCVPath);
                    }
                }
            }


            $profile->update();

            $request->session()->flash('success', 'Profile updated successfully.');

            return redirect()->route('Profiles.index');
        } else {
            return redirect()->route('Profiles.edit', $id)->withErrors($validator)->withInput();
        }
    }

    public function destroy($id)
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return redirect()->route('Profiles.index')->with('error', 'Profile not found');
        }

        // Delete the profile's image file if it exists
        if ($profile->image) {
            $imagePath = public_path('/uploads/profile/') . $profile->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $profile->delete();

        return redirect()->route('Profiles.index')->with('success', 'Profile deleted successfully.');
    }
}