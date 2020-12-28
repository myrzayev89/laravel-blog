<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        if ($request->method() == 'POST')
        {
            $request->validate([
                'email' => 'required|email',
                'content' => 'required',
            ]);
            $data = [
                'email' => $request->email,
                'content' => $request->content
            ];
            Mail::send('front.pages.email-template', $data, function ($message) use ($data) {
                $message->to($data['email'])
                    ->subject('Markedia - Bizimle elaqe');
            });
            return redirect()->back()->with('success', 'Mesaj göndərildi');
        }
        return view('front.pages.contact');
    }
}
