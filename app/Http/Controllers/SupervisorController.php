<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{

    public function updateStatus(Request $request, User $user)
    {
        \Log::info('Approval status update request received.', [
            'user_id' => $user->id,
            'status' => $request->input('approval_status')
        ]);

        $status = $request->input('approval_status');

        // Validate that the status is either 'approved' or 'rejected'
        if (!in_array($status, ['approved', 'rejected'])) {
            return redirect()->back()->with('error', 'Invalid status provided.');
        }

        // Update the user's approval status
        $user->update(['approval_status' => $status]);

        \Log::info('User approval status updated.', [
            'user_id' => $user->id,
            'new_status' => $status
        ]);

        // If approved, add the user to the volunteers table
        if ($status === 'approved') {
            Volunteer::create(['user_id' => $user->id]);
            \Log::info('User added to volunteers.', ['user_id' => $user->id]);
        }

        // Set appropriate success message based on the status
        $message = ($status === 'approved') ? 'User approved successfully.' : 'User rejected successfully.';

        // Redirect back to the same page with the success message
        return redirect()->back()->with('success', $message);
    }

    public function showRegisterVolForm()
    {
        $users = User::paginate(10);
        return view('Supervisor.register_vol', compact('users'));
    }

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
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
    public function show(Supervisor $supervisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supervisor $supervisor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supervisor $supervisor)
    {
        //
    }


    public function destroy(Supervisor $supervisor)
    {
        //
    }


}
