<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use Illuminate\Http\Request;
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

        Cafe::findOrFail($id)->update($data);

        return redirect()->route('cafe.index')->with('toast_success', 'Update Cafe Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cafe::findOrFail($id)->delete();

        return redirect()->route('cafe.index')->with('toast_success', 'Delete Cafe Successfully!');
    }
}
