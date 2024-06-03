<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data = Cafe::findOrfail($id);

        return view('pages.menu.index', compact('data'));
    }

    public function getData($cafe_id)
    {
        $menu = Menu::where('cafe_id', $cafe_id)->with(['category'])->get();

        return DataTables::of($menu)->make(true);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $data = Cafe::findOrfail($id);
        $category = Category::all();

        return view('pages.menu.create', compact('data', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('photo')) {
            $images = $request->file('photo');

            $extension = $images->getClientOriginalExtension();

            $file_name = $data['name'] . "-" . uniqid() . "." . $extension;

            $data['photo'] = $images->storeAs('menu', $file_name, 'public');
        }

        Menu::create($data);

        return redirect()->route('menu-index', ['id' => $request->input('cafe_id')])->with('toast_success', 'Create Menu Successfully!');
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
        $data = Menu::findOrFail($id);
        $category = Category::all();

        return view('pages.menu.edit', compact('data', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $menu = Menu::findOrFail($id);

        $this->validate($request, [
            'photo' => 'image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($menu->photo);

            $images = $request->file('photo');

            $extension = $images->getClientOriginalExtension();

            $file_name = $data['name']. "-". uniqid(). ".". $extension;

            $data['photo'] = $images->storeAs('menu', $file_name, 'public');
        }

        $menu->update($data);

        return redirect()->route('menu-index', ['id' => $request->input('cafe_id')])->with('toast_success', 'Update Menu Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);

        $cafeId = $menu->cafe_id;

        Storage::disk('public')->delete($menu->photo);

        $menu->delete();

        return redirect()->route('menu-index', ['id' => $cafeId])->with('toast_success', 'Delete Menu Successfully!');
    }
}
