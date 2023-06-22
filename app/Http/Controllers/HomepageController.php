<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Destination;
use App\Models\Feedback;
use App\Models\History;
use App\Models\Location;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homepage()
    {
        return view('homepage.index', [
            'destinations' => Destination::take(6)->orderBy('rating', 'desc')->get(),
        ]);
    }
}
