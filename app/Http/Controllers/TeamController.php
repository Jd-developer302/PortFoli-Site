<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Http\Requests\Admin\TeamFormRequest;

class TeamController extends Controller
{
    public function index()
    {
        $teamMembers = Team::all(); 
        return view('dashboard.Team.index', compact('teamMembers'));
    }
    public function create()
    {
        return view('dashboard.Team.add-team');
    }
    public function store(TeamFormRequest $request)
    {
        
    $validatedData = $request->validated();

    
    if ($request->hasFile('image_name')) {
        $image = $request->file('image_name');
        $imagePath = $image->store('team_images', 'public');
    } else {
        $imagePath = null;
    }

    
    $team = new Team;
    $team->name = $validatedData['name'];
    $team->image_name = $imagePath; 
    $team->designation = $validatedData['designation'];
    $team->gmail = $validatedData['gmail'];
    $team->linkedin = $validatedData['linkedin'];
    $team->facebook = $validatedData['facebook'];

    
    $team->save();

  
    return redirect()->route('Team.index')->with('success', 'Team member added successfully');

  }
    public function edit($id)
    {
        $teamMember = Team::find($id);
        if (!$teamMember) {

            return redirect()->route('Team.index')->with('error', 'Team member not found');
        }
        return view('dashboard.Team.edit-team', compact('teamMember'));
    }
    public function update(TeamFormRequest $request, $id)
{
    
    $teamMember = Team::find($id);

    if (!$teamMember) {
        return redirect()->route('Team.index')->with('error', 'Team member not found');
    }

 
    $validatedData = $request->validated();

    
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('team_images', 'public');
        $teamMember->image_name = $imagePath;
    }

    
    $teamMember->name = $validatedData['name'];
    $teamMember->designation = $validatedData['designation'];
    $teamMember->gmail = $validatedData['gmail'];
    $teamMember->linkedin = $validatedData['linkedin'];
    $teamMember->facebook = $validatedData['facebook'];

    
    $teamMember->save();

    return redirect()->route('Team.index')->with('success', 'Team member updated successfully');
}
public function destroy($id)
{
    $teamMember = Team::find($id);

    if (!$teamMember) {
        return redirect()->route('Team.index')->with('error', 'Team member not found');
    }

    $teamMember->delete();

    return redirect()->route('Team.index')->with('success', 'Team member deleted successfully');
}

}
