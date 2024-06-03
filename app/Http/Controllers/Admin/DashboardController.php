<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $category = Category::count();
        $cafe = Cafe::count();
        $menu = Menu::count();

        return view('pages.dashboard', compact('category', 'cafe', 'menu'));
    }
}
