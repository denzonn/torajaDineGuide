<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class CafeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.cafe.index');
    }

    public function getData()
    {
        $cafe = Cafe::all();

        return DataTables::of($cafe)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.cafe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $images = $request->file('photo');

            $extension = $images->getClientOriginalExtension();

            $file_name = uniqid() . "." . $extension;

            $data['photo'] = $images->storeAs('kuliner', $file_name, 'public');
        }

        Cafe::create($data);

        return redirect()->route('cafe.index')->with('toast_success', 'Create Cafe Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Cafe::findOrFail($id);

        return view('pages.cafe.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $cafe = Cafe::findOrFail($id);

        if ($request->hasFile('photo')) {
            if($cafe->photo){
                Storage::disk('public')->delete($cafe->photo);
            }

            $images = $request->file('photo');

            $extension = $images->getClientOriginalExtension();

            $file_name = uniqid() . "." . $extension;

            $data['photo'] = $images->storeAs('kuliner', $file_name, 'public');
        }
        $cafe->update($data);

        return redirect()->route('cafe.index')->with('toast_success', 'Update Cafe Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cafe = Cafe::findOrFail($id);

        if ($cafe->photo) {
            Storage::disk('public')->delete($cafe->photo);
        }

        $cafe->delete();


        return redirect()->route('cafe.index')->with('toast_success', 'Delete Cafe Successfully!');
    }
}
