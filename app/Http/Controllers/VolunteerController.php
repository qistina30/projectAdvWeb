<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showProfile($id)
    {
        $user = User::findOrFail($id);
        $volunteer = $user->volunteer;

        if (!$volunteer) {
            return redirect()->back()->with('error', 'No volunteer profile found for this user.');
        }

        return view('Volunteer.showProfile', compact('volunteer'));
    }

    public function edit($id)
    {
        $volunteer = Volunteer::findOrFail($id);

        return view('Volunteer.edit', compact('volunteer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $volunteer = Volunteer::findOrFail($id);
        $volunteer->user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->back()->withSuccess('Volunteer profile updated successfully.');
    }


    public function destroy(Volunteer $volunteer)
    {
        //
    }
}
