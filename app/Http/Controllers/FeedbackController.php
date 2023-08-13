<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeedbackController extends Controller
{
    public function index()
    {
        if (!$locale = session('locale')) {
            Session::put('locale', 'id');
        } else {
            app()->setLocale($locale);
        }

        return view('feedback.index', [
            'page' => 'Feedback',
            'feedbacks' => Feedback::all(),
        ]);
    }

    public function edit($id)
    {
        $feedback = Feedback::where('id', $id)->first();
        return response()->json($feedback);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'position' => 'required',
            'message' => 'required',
        ]);

        $feedback = Feedback::findOrFail($id)->update($validatedData);
        if ($feedback) {
            return redirect(route('index-feedback'))->with('success', 'Update Feedback Successfully!');
        } else {
            return redirect(route('index-feedback'))->with('failed', 'Update Feedback Failed!');
        }
    }

    public function delete($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback = $feedback->delete();
        if ($feedback) {
            return redirect(route('index-feedback'))->with('success', 'Delete Feedback Successfully!');
        } else {
            return redirect(route('index-feedback'))->with('failed', 'Delete Feedback Failed!');
        }
    }
}
