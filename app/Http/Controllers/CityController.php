<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CityController extends Controller
{
    public function index()
    {
        $text_history_1 = City::select('history_1')
            ->get()
            ->map(function ($text) {
                return Str::limit($text->history_1, 100);
            });

        $text_history_2 = City::select('history_2')
            ->get()
            ->map(function ($text) {
                return Str::limit($text->history_2, 100);
            });

        return view('city.index', [
            'page' => 'Cities',
            'cities' => City::all(),
            'text_history_1' => $text_history_1,
            'text_history_2' => $text_history_2,
        ]);
    }
}
