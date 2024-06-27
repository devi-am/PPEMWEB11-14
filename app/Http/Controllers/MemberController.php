<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Group;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // Display a listing of the members
    public function index(Request $request)
    {
        $group_id = $request->input('group_id');
        $members = Member::where('id_group', $group_id)->get();
        $group = Group::findOrFail($group_id);
        return view('members.index', compact('members', 'group'));
    }

    public function artist()
    {
        $members = Member::with('group')->get();
        return view('artists.index', compact('members'));
    }

    // Show the form for creating a new member
    public function create()
    {
        $groups = Group::all();
        return view('artists.create', compact('groups'));
    }
    
    // Store a newly created member in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_group' => 'required|exists:groups,id',
            'nama_panggung' => 'required|max:255',
            'nama_asli' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'kewarganegaraan' => 'required|max:255',
            'foto_member' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto_member')) {
            $path = $request->file('foto_member')->store('member_photos', 'public');
            $validatedData['foto_member'] = $path;
        }

        Member::create($validatedData);

        return redirect()->route('artists.index')->with('success', 'Member created successfully.');
    }

    // Display the specified member
    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    // Show the form for editing the specified member
    public function edit(Member $member)
    {
        $groups = Group::all();
        return view('artists.edit', compact('member', 'groups'));
    }

    // Update the specified member in the database
    public function update(Request $request, Member $member)
    {
        $validatedData = $request->validate([
            'id_group' => 'required|exists:groups,id',
            'nama_panggung' => 'required|max:255',
            'nama_asli' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'kewarganegaraan' => 'required|max:255',
            'foto_member' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto_member')) {
            $path = $request->file('foto_member')->store('member_photos', 'public');
            $validatedData['foto_member'] = $path;
        }

        $member->update($validatedData);

        return redirect()->route('artists.index')->with('success', 'Artist updated successfully.');
    }

    // Remove the specified member from the database
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('artists.index')->with('success', 'Artist deleted successfully.');
    }

    // public function group()
    // {
    //     return $this->belongsTo(Group::class, 'id_group');
    // }
    
}