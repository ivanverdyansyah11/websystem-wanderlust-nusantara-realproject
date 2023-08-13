<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Destination;
use App\Models\Gallery;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        if (!$locale = session('locale')) {
            Session::put('locale', 'id');
        } else {
            app()->setLocale($locale);
        }

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
            'gallery_count_destination' => $gallery_count,
            'gallery_count_all' => $mergedArray,
        ]);
    }
}
