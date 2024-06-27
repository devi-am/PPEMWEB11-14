<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    // Display a listing of the groups
    public function index()
    {
        $groups = Group::all();
        return view('home', compact('groups'));
    }

    // Show the form for creating a new group
    public function create()
    {
        return view('groups.create');
    }

    // Store a newly created group in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_grub' => 'required|max:255',
            'foto_grub' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jenis' => 'required|in:boy group,girl group',
            'generasi' => 'required|string',
            'tahun_debut' => 'required|integer|min:1900|max:' . (date('Y') + 1),
        ]);

        if ($request->hasFile('foto_grub')) {
            $path = $request->file('foto_grub')->store('group_photos', 'public');
            $validatedData['foto_grub'] = $path;
        }

        Group::create($validatedData);

        return redirect()->route('home')->with('success', 'Group created successfully.');
    }

    // Display the specified group
    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }

    // Show the form for editing the specified group
    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    // Update the specified group in the database
    public function update(Request $request, Group $group)
    {
        $validatedData = $request->validate([
            'nama_grub' => 'required|max:255',
            'foto_grub' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jenis' => 'required|in:boy group,girl group',
            'generasi' => 'required|string',
            'tahun_debut' => 'required|integer|min:1900|max:' . (date('Y') + 1),
        ]);

        if ($request->hasFile('foto_grub')) {
            $path = $request->file('foto_grub')->store('group_photos', 'public');
            $validatedData['foto_grub'] = $path;
        }

        $group->update($validatedData);

        return redirect()->route('home')->with('success', 'Group updated successfully.');
    }

    // Remove the specified group from the database
    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('home')->with('success', 'Group deleted successfully.');
    }

    public function home()
{
    $groups = Group::all();
    return view('home', compact('groups'));
}
}