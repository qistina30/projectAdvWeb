<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::query();

        if ($request->has('ic_number')) {
            $query->where('ic_number', 'like', '%' . $request->input('ic_number') . '%');
        }

        $members = $query->paginate(10);
        return view('member.index', compact('members'));
    }

    public function create()
    {
        return view('member.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ic_number' => 'required|regex:/^\d{6}-\d{2}-\d{4}$/',
            'address' => 'required|string|max:255',
            'phoneNo' => 'required|regex:/^0\d{8,}$/',
        ]);

        // Proceed to store the member in the database
        Member::create([
            'volunteer_id' => auth()->user()->volunteer->id,
            'name' => $request->input('name'),
            'ic_number' => $request->input('ic_number'),
            'address' => $request->input('address'),
            'phoneNo' => $request->input('phoneNo'),
        ]);

        return redirect()->route('member.index')->with('success', 'Member added successfully.');
    }


    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('member.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ic_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phoneNo' => 'required|string|max:255',
        ]);

        $member = Member::findOrFail($id);
        $member->update([
            'name' => $request->input('name'),
            'ic_number' => $request->input('ic_number'),
            'address' => $request->input('address'),
            'phoneNo' => $request->input('phoneNo'),
        ]);

        return redirect()->route('member.index')->with('success', 'Member updated successfully.');
    }

    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view('member.show', compact('member'));
    }
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('member.index')
            ->with('success', 'Membership deleted successfully.');
    }
}
