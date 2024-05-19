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
       //$volunteer = Volunteer::findOrFail($id);
        // Fetch the volunteer data from the database
        //$volunteer = Volunteer::find($id); // Fetch the volunteer data from the database based on $id
        $user = User::find($id);
        $volunteer = $user->volunteer;
        // Pass the volunteer data to the view
        //return view('profile.show', ['volunteer' => $volunteer]);
        return view('Volunteer.showProfile', compact('volunteer'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Volunteer $volunteer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Volunteer $volunteer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Volunteer $volunteer)
    {
        //
    }
}
