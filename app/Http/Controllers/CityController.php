<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'file|image',
            'history_1' => 'required',
            'history_2' => 'required',
        ]);

        $validatedData['image'] = $request->file('image')->store('city-images');
        $city = City::create($validatedData);
        if ($city) {
            return redirect(route('index-city'))->with('success', 'Add New City Successfully!');
        } else {
            return redirect(route('index-city'))->with('failed', 'Add New City Failed!');
        }
    }

    public function edit($id)
    {
        $city = City::where('id', $id)->first();
        return response()->json($city);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'file|image',
            'history_1' => 'required',
            'history_2' => 'required',
        ]);

        if ($request->file('image')) {
            Storage::delete($request->oldImage);
            $validatedData['image'] = $request->file('image')->store('city-images');
        }

        $city = City::findOrFail($id)->update($validatedData);
        if ($city) {
            return redirect(route('index-city'))->with('success', 'Update City Successfully!');
        } else {
            return redirect(route('index-city'))->with('failed', 'Update City Failed!');
        }
    }

    public function delete($id)
    {
        $city = City::findOrFail($id);

        if ($city->image) {
            Storage::delete($city->image);
        }

        $city = $city->delete();
        if ($city) {
            return redirect(route('index-city'))->with('success', 'Delete City Successfully!');
        } else {
            return redirect(route('index-city'))->with('failed', 'Delete City Failed!');
        }
    }
}
