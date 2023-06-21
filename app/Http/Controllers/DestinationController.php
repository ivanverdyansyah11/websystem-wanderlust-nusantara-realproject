<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    public function index()
    {
        $text_history_1 = Destination::select('history_1')
            ->get()
            ->map(function ($text) {
                return Str::limit($text->history_1, 100);
            });

        return view('destination.index', [
            'page' => 'Destination',
            'destinations' => Destination::all(),
            'cities' => City::all(),
            'text_history_1' => $text_history_1,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cities_id' => 'required',
            'name' => 'required',
            'rating' => 'required',
            'location' => 'required',
            'image' => 'file|image',
            'history_1' => 'required',
            'history_2' => 'required',
        ]);

        $validatedData['image'] = $request->file('image')->store('destination-images');
        $destination = Destination::create($validatedData);
        if ($destination) {
            return redirect(route('index-destination'))->with('success', 'Add New Destination Successfully!');
        } else {
            return redirect(route('index-destination'))->with('failed', 'Add New Destination Failed!');
        }
    }

    public function edit($id)
    {
        $destination = Destination::where('id', $id)->first();
        return response()->json($destination);
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

        if ($request->file('image')) {
            Storage::delete($request->oldImage);
            $validatedData['image'] = $request->file('image')->store('destination-images');
        }

        $destination = Destination::findOrFail($id)->update($validatedData);
        if ($destination) {
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
