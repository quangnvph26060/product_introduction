<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Process;
use Illuminate\Http\Request;

class AdminProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $processes = Process::all();
        return view('admin.processes.index', compact('processes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.processes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
            'status' => 'required|in:published,unpublished'
        ]);

        Process::create($validatedData);
        return redirect()->route('admin.processes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $process = Process::find($id);
        return view('admin.processes.show', compact('process'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $process = Process::find($id);
        return view('admin.processes.edit', compact('process'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
            'status' => 'required|in:published,unpublished'
        ]);

        Process::find($id)->update($validatedData);
        return redirect()->route('admin.processes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Process::destroy($id);
        return redirect()->route('admin.processes.index');
    }
}