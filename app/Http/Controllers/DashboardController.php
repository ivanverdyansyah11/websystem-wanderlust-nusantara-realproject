<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\City;
use App\Models\Destination;
use App\Models\Feedback;
use App\Models\Gallery;
use App\Models\Location;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $text_history_1 = Destination::select('history_1')
            ->get()
            ->map(function ($text) {
                return Str::limit($text->history_1, 100);
            });

        $gallery_count = Gallery::select('image')->get()
            ->map(function ($file) {
                return explode(',', $file->image);
            });

        $gallery_count_all = Gallery::select('image')->get()
            ->map(function ($file) {
                return explode(',', $file->image);
            })->toArray();

        $mergedArray = array_merge(...$gallery_count_all);
        $mergedArray = count($mergedArray);

        return view('dashboard.index', [
            'page' => 'Destination',
            'destinations' => Destination::latest()->take(4)->get(),
            'destination_count' => Destination::count(),
            'city_count' => City::count(),
            'gallery_count' => Gallery::count(),
            'text_history_1' => $text_history_1,
            'gallery_count_destination' => $gallery_count,
            'gallery_count_all' => $mergedArray,
        ]);
    }
}
