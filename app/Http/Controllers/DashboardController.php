<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Feedback;
use App\Models\Location;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'page' => 'Dashboard',
        ]);
    }
}
