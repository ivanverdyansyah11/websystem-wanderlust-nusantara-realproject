<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\City;
use App\Models\Destination;
use App\Models\Feedback;
use App\Models\Gallery;
use App\Models\History;
use App\Models\Location;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homepage()
    {
        $gallery_count_all = Gallery::select('image')->get()
            ->map(function ($file) {
                return explode(',', $file->image);
            })->toArray();

        $mergedArray = array_merge(...$gallery_count_all);
        $mergedArray = count($mergedArray);

        return view('homepage.index', [
            'page' => 'Homepage',
            'destinations' => Destination::take(6)->orderBy('rating', 'desc')->get(),
            'destination_all' => Destination::all(),
            'destination_count' => Destination::count(),
            'city_count' => City::count(),
            'gallery_count_all' => $mergedArray,
        ]);
    }

    public function location()
    {
        return view('homepage.location', [
            'page' => 'Destination Location',
            'destination_all' => Destination::all(),
            'cities' => City::all(),
        ]);
    }

    public function gallery()
    {
        return view('homepage.location', [
            'page' => 'Destination Location',
            'destination_all' => Destination::all(),
            'cities' => City::all(),
        ]);
    }
}
