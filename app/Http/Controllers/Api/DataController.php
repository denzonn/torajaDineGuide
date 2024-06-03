<?php

namespace App\Http\Controllers\Api;

use App\Models\Cafe;
use App\Models\Category;
use App\Models\Menu;

class DataController extends BaseController
{
    public function category()
    {
        $category = Category::all();

        if ($category->isEmpty()) {
            return $this->sendError('Category Not Found');
        }

        return $this->sendResponse($category, 'Success Get Category');
    }

    public function cafe()
    {
        $cafe = Cafe::all();

        if ($cafe->isEmpty()) {
            return $this->sendError('Cafe Not Found');
        }

        return $this->sendResponse($cafe, 'Success Get Cafe');
    }

    public function menu($cafe_id)
    {
        $menu = Menu::where('cafe_id', $cafe_id)->with(['category'])->get();

        if ($menu->isEmpty()) {
            return $this->sendError('Menu Not Found');
        }
        return $this->sendResponse($menu, 'Success Get Menu');
    }
}
