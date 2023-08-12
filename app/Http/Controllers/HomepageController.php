<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Destination;
use App\Models\Gallery;
use Illuminate\Support\Facades\Session;

class HomepageController extends Controller
{
    public function homepage()
    {
        if (!$locale = session('locale')) {
            Session::put('locale', 'id');
        } else {
            app()->setLocale($locale);
        }

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
        if (!$locale = session('locale')) {
            Session::put('locale', 'id');
        } else {
            app()->setLocale($locale);
        }

        return view('homepage.location', [
            'page' => 'Destination Location',
            'destination_all' => Destination::all(),
            'cities' => City::all(),
        ]);
    }

    public function locationDetail($id)
    {
        if (!$locale = session('locale')) {
            Session::put('locale', 'id');
        } else {
            app()->setLocale($locale);
        }

        return view('homepage.location-detail', [
            'page' => 'Location Detail',
            'destination_all' => Destination::all(),
            'city' => City::where('id', $id)->first(),
            'destinations' => Destination::where('cities_id', $id)->get(),
        ]);
    }

    public function gallery()
    {
        if (!$locale = session('locale')) {
            Session::put('locale', 'id');
        } else {
            app()->setLocale($locale);
        }

        $gallery_count_all = Gallery::select('image')->get()
            ->map(function ($file) {
                return explode(',', $file->image);
            })->toArray();

        $mergedArray = array_merge(...$gallery_count_all);

        return view('homepage.gallery', [
            'page' => 'Gallery Documentation',
            'destination_all' => Destination::all(),
            'galleries' => $mergedArray,
        ]);
    }

    public function destinationDetail($id)
    {
        if (!$locale = session('locale')) {
            Session::put('locale', 'id');
        } else {
            app()->setLocale($locale);
        }

        $images = Gallery::where('destinations_id', $id)->value('image');
        $images = explode(',', $images);

        return view('homepage.destination', [
            'page' => 'Destination Detail',
            'destination' => Destination::where('id', $id)->first(),
            'recommendations' => Destination::whereNotIn('id', [$id])->take(5)->get(),
            'gallery' => $images,
        ]);
    }

    public function switchLanguage($locale)
    {
        Session::put('locale', $locale);

        return redirect()->back();
    }
}
