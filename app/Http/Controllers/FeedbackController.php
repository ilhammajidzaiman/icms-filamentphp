<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature\Feedback;
use App\Http\Controllers\Controller;
use App\Models\Feature\FeedbackCategory;
use RealRashid\SweetAlert\Facades\Alert;

class FeedbackController extends Controller
{
    public function index()
    {
        $data['feedbackCategory'] = FeedbackCategory::show()
            ->get();
        return view('page.public.feedback.index', $data);
    }

    public function store(Request $request)
    {
        // validation input
        $request->validate([
            'feedback_category_id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string'],
        ]);

        Feedback::create([
            'feedback_category_id' => $request->feedback_category_id,
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        alert()->success('Berhasil', 'Kritik dan saran berhasil dikirim.');

        return redirect()->route('feedback.index');
    }
}
