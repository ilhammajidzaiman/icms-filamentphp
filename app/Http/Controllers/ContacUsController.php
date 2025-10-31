<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Feature\ContacUs;
use App\Http\Controllers\Controller;

class ContacUsController extends Controller
{
    public function index()
    {
        return view('page.public.contac-us.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string'],
        ]);
        ContacUs::create([
            'name' => $request->name,
            'subject' => $request->subject,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        alert()->success(Str::ucfirst(__('berhasil')), Str::ucfirst(__('akan kami hubungi kembali melalui email yang anda kirim.')));
        return redirect()->route('contacus.index');
    }
}
