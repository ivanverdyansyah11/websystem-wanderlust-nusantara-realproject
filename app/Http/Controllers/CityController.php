<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CityTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    public function index()
    {
        if (!$locale = session('locale')) {
            Session::put('locale', 'id');
        } else {
            app()->setLocale($locale);
        }

        return view('city.index', [
            'page' => 'Cities',
            'cities' => City::with('city_translations')->get(),
            'id' => City::latest('id')->value('id'),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'image' => 'file|image',
            'history_1' => 'required',
            'history_2' => 'required',
        ]);

        $validatedDataTranslation = $request->validate([
            'name_translation' => 'required',
            'history_1_translation' => 'required',
            'history_2_translation' => 'required',
        ]);

        $validatedData['image'] = $request->file('image')->store('city-images');

        $city = City::create($validatedData);

        $cityTranslationIN = CityTranslation::create([
            'cities_id' => $validatedData['id'],
            'language' => 'id',
            'name' => $validatedData['name'],
            'image' => $validatedData['image'],
            'history_1' => $validatedData['history_1'],
            'history_2' => $validatedData['history_2'],
        ]);

        $cityTranslationEN = CityTranslation::create([
            'cities_id' => $validatedData['id'],
            'language' => 'en',
            'name' => $validatedDataTranslation['name_translation'],
            'image' => $validatedData['image'],
            'history_1' => $validatedDataTranslation['history_1_translation'],
            'history_2' => $validatedDataTranslation['history_2_translation'],
        ]);

        if ($city && $cityTranslationIN && $cityTranslationEN) {
            return redirect(route('index-city'))->with('success', 'Add New City Successfully!');
        } else {
            return redirect(route('index-city'))->with('failed', 'Add New City Failed!');
        }
    }

    public function edit($id)
    {
        $city = City::where('id', $id)->first();
        $cityTranslation = CityTranslation::where('cities_id', $id)->get();
        return response()->json([$city, $cityTranslation]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'file|image',
            'history_1' => 'required',
            'history_2' => 'required',
        ]);

        $validatedDataTranslation = $request->validate([
            'name_translation' => 'required',
            'history_1_translation' => 'required',
            'history_2_translation' => 'required',
        ]);

        if ($request->file('image')) {
            Storage::delete($request->oldImage);
            $validatedData['image'] = $request->file('image')->store('city-images');
        }

        $city = City::findOrFail($id)->update($validatedData);

        $cityTranslationIN = CityTranslation::where('cities_id', $id)->where('language', 'id')->update([
            'name' => $validatedData['name'],
            'image' => $validatedData['image'],
            'history_1' => $validatedData['history_1'],
            'history_2' => $validatedData['history_2'],
        ]);

        $cityTranslationEN = CityTranslation::where('cities_id', $id)->where('language', 'en')->update([
            'name' => $validatedDataTranslation['name_translation'],
            'image' => $validatedData['image'],
            'history_1' => $validatedDataTranslation['history_1_translation'],
            'history_2' => $validatedDataTranslation['history_2_translation'],
        ]);

        if ($city && $cityTranslationIN && $cityTranslationEN) {
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

        $cityID = CityTranslation::where('cities_id', $id)->where('language', 'id')->first()->delete();
        $cityEN = CityTranslation::where('cities_id', $id)->where('language', 'en')->first()->delete();

        $city = $city->delete();
        if ($city && $cityID && $cityEN) {
            return redirect(route('index-city'))->with('success', 'Delete City Successfully!');
        } else {
            return redirect(route('index-city'))->with('failed', 'Delete City Failed!');
        }
    }
}
