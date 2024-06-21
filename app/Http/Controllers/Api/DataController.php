<?php

namespace App\Http\Controllers\Api;

use App\Models\Cafe;
use App\Models\CafeReview;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $cafe = Cafe::with(['review.user'])->get();

        if ($cafe->isEmpty()) {
            return $this->sendError('Cafe Not Found');
        }

        return $this->sendResponse($cafe, 'Success Get Cafe');
    }

    public function menu($cafe_id)
    {
        $category_id = request()->input('category_id');

        $query = Menu::where('cafe_id', $cafe_id);

        if (!is_null($category_id)) {
            $query->where('category_id', $category_id);
        }

        $menu = $query->with(['category'])->orderBy('category_id')->get();

        if ($menu->isEmpty()) {
            return $this->sendError('Menu Not Found');
        }

        return $this->sendResponse($menu, 'Success Get Menu');
    }


    public function getReview($cafe_id)
    {
        $data = CafeReview::where('cafe_id', $cafe_id)->where('user_id', Auth::user()->id)->first();

        if (!$data) {
            return $this->sendError('Review Not Found');
        }

        return $this->sendResponse($data, 'Success Create Review');
    }

    public function review(Request $request, $cafe_id)
    {
        $data = $request->all();

        CafeReview::create([
            'user_id' => Auth::user()->id,
            'cafe_id' => $cafe_id,
            ...$data
        ]);

        return $this->sendResponse($data, 'Success Create Review');
    }
}
