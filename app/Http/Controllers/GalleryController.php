<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        return view('gallery.index', [
            'page' => 'Gallery',
            'destinations' => Destination::all(),
        ]);
    }

    public function detail($id)
    {
        $imagesFull = Gallery::where('destinations_id', $id)->pluck('image')->toArray();

        $imageJoin = implode(',', $imagesFull);
        $imagesArray = explode(',', $imageJoin);

        return view('gallery.detail', [
            'page' => 'Gallery',
            'destination' => Destination::findOrFail($id),
            'galleries' => Gallery::where('destinations_id', $id)->get(),
            'images' => $imagesArray,
        ]);
    }

    public function store(Request $request)
    {
        $checkGallery = Gallery::where('destinations_id', $request->destinations_id)->value('image');

        if (is_null($checkGallery)) {
            $imageStore = [];
            foreach ($request->file('images') as $image) {
                $imageStore[] = $image->store('destination-images');
            }
            $imagesConvert = implode(',', $imageStore);

            $gallery = Gallery::findOrFail($request->destinations_id)->update([
                'image' => $imagesConvert,
            ]);
            if ($gallery) {
                return redirect('/admin/gallery/' . $request->destinations_id)->with('success', 'Add New Gallery Successfully!');
            } else {
                return redirect('/admin/gallery/' . $request->destinations_id)->with('failed', 'Add New Gallery Failed!');
            }
        } else {
            $checkGallery = Gallery::where('destinations_id', $request->destinations_id)->value('image');
            $imageOld = explode(',', $checkGallery);
            $imageNew = [];
            foreach ($request->file('images') as $image) {
                $imageNew[] = $image->store('destination-images');
            }
            $imagesStore = array_merge($imageOld, $imageNew);
            $imagesStore = implode(',', $imagesStore);

            $gallery = Gallery::findOrFail($request->destinations_id)->update([
                'image' => $imagesStore,
            ]);
            if ($gallery) {
                return redirect('/admin/gallery/' . $request->destinations_id)->with('success', 'Add New Gallery Successfully!');
            } else {
                return redirect('/admin/gallery/' . $request->destinations_id)->with('failed', 'Add New Gallery Failed!');
            }
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
            return redirect('/admin/gallery/' . $id)->with('success', 'Delete Destination Successfully!');
        } else {
            return redirect('/admin/gallery/' . $id)->with('failed', 'Delete Destination Failed!');
        }
    }
}
