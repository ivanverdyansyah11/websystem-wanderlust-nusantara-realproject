<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Destination;
use App\Models\DestinationTranslation;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class DestinationController extends Controller
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

        return view('destination.index', [
            'page' => 'Destination',
            'id' => Destination::latest('id')->value('id'),
            'destinations' => Destination::with('destination_translations')->get(),
            'cities' => City::all(),
            'gallery_count' => $gallery_count,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'cities_id' => 'required',
            'name' => 'required',
            'rating' => 'required',
            'location' => 'required',
            'image' => 'file|image',
            'history_1' => 'required',
            'history_2' => 'required',
        ]);

        $validatedDataTranslation = $request->validate([
            'name_translation' => 'required',
            'history_1_translation' => 'required',
            'history_2_translation' => 'required',
        ]);

        $validatedData['image'] = $request->file('image')->store('destination-images');

        $gallery = Gallery::create([
            'destinations_id' => $validatedData['id'],
        ]);

        $destination = Destination::create($validatedData);

        $destinationIN = DestinationTranslation::create([
            'destinations_id' => $validatedData['id'],
            'language' => 'id',
            'cities_id' => $validatedData['cities_id'],
            'name' => $validatedData['name'],
            'rating' => $validatedData['rating'],
            'location' => $validatedData['location'],
            'image' => $validatedData['location'],
            'history_1' => $validatedData['history_1'],
            'history_2' => $validatedData['history_2'],
        ]);

        $destinationEN = DestinationTranslation::create([
            'destinations_id' => $validatedData['id'],
            'language' => 'en',
            'cities_id' => $validatedData['cities_id'],
            'name' => $validatedDataTranslation['name_translation'],
            'rating' => $validatedData['rating'],
            'location' => $validatedData['location'],
            'image' => $validatedData['location'],
            'history_1' => $validatedDataTranslation['history_1_translation'],
            'history_2' => $validatedDataTranslation['history_2_translation'],
        ]);

        if ($destination && $gallery && $destinationIN && $destinationEN) {
            return redirect(route('index-destination'))->with('success', 'Add New Destination Successfully!');
        } else {
            return redirect(route('index-destination'))->with('failed', 'Add New Destination Failed!');
        }
    }

    public function edit($id)
    {
        $destination = Destination::where('id', $id)->first();
        $destinationTranslation = DestinationTranslation::where('destinations_id', $id)->get();
        return response()->json([$destination, $destinationTranslation]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'rating' => 'required',
            'location' => 'required',
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
            $validatedData['image'] = $request->file('image')->store('destination-images');
        }

        $destination = Destination::findOrFail($id)->update($validatedData);

        $destinationTranslationIN = DestinationTranslation::where('destinations_id', $id)->where('language', 'id')->update([
            'name' => $validatedData['name'],
            'rating' => $validatedData['rating'],
            'location' => $validatedData['location'],
            'image' => $validatedData['location'],
            'history_1' => $validatedData['history_1'],
            'history_2' => $validatedData['history_2'],
        ]);

        $destinationTranslationEN = DestinationTranslation::where('destinations_id', $id)->where('language', 'en')->update([
            'name' => $validatedDataTranslation['name_translation'],
            'rating' => $validatedData['rating'],
            'location' => $validatedData['location'],
            'image' => $validatedData['location'],
            'history_1' => $validatedDataTranslation['history_1_translation'],
            'history_2' => $validatedDataTranslation['history_2_translation'],
        ]);

        if ($destination && $destinationTranslationIN && $destinationTranslationEN) {
            return redirect(route('index-destination'))->with('success', 'Update Destination Successfully!');
        } else {
            return redirect(route('index-destination'))->with('failed', 'Update Destination Failed!');
        }
    }

    public function delete($id)
    {
        $destination = Destination::findOrFail($id);

        if ($destination->image) {
            Storage::delete($destination->image);
        }

        $destination = $destination->delete();
        if ($destination) {
            return redirect(route('index-destination'))->with('success', 'Delete Destination Successfully!');
        } else {
            return redirect(route('index-destination'))->with('failed', 'Delete Destination Failed!');
        }
    }
}
