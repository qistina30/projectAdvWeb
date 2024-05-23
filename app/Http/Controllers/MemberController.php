<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        /*$members = Member::all();
        return view('member.index', compact('members'));*/
        $members = Member::paginate(10);
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
            'ic_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phoneNo' => 'required|string|max:255',
        ]);

        Member::create([
            'volunteer_id' => auth()->user()->volunteer->id,
            'name' => $request->input('name'),
            'ic_number' => $request->input('ic_number'),
            'address' => $request->input('address'),
            'phoneNo' => $request->input('phoneNo'),
        ]);

        return redirect()->route('member.index')->with('success', 'Member created successfully.');
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
