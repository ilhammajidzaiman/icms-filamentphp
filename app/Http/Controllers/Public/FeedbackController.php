<?php

namespace App\Http\Controllers\Public;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\FeedbackCategory;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function index()
    {
        $data['feedbackCategory'] = FeedbackCategory::show()->get();
        return view('public.feedback.index', $data);
    }

    public function store(Request $request)
    {
        // validation input
        $request->validate([
            'feedback_category_id'  => ['required', 'string'],
            'name'                  => ['required', 'string'],
            'email'                 => ['required', 'email'],
            'message'               => ['required', 'string'],
        ]);

        Feedback::create([
            'feedback_category_id' => $request->feedback_category_id,
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        $flashData = [
            'message'               => 'Berhasil dikirim',
            'alert'                 => 'primary',
            'icon'                  => 'bi bi-check2-square',
        ];

        return redirect()->route('feedback.index')->with($flashData);
    }
}
