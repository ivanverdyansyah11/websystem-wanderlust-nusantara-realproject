<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Feedback;
use App\Models\History;
use App\Models\Location;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homepage()
    {
        return view('homepage.index', [
            'menu_count' => Menu::count(),
            'location_count' => Location::count(),
            'feedback_count' => Feedback::count(),
            'locations' => Location::all(),
            'menus' => Menu::all(),
            'chefs' => Chef::all(),
        ]);
    }

    public function detailMenu($id)
    {
        $menu = Menu::where('id', $id)->first();
        return response()->json($menu);
    }

    public function history($id)
    {
        return view('homepage.detail', [
            'page' => Menu::where('id', $id)->first('name'),
            'menu' => Menu::where('id', $id)->first(),
            'recommendations' => Menu::whereNotIn('id', [$id])->get(),
            'history' => History::where('menus_id', $id)->first(),
        ]);
    }
}
