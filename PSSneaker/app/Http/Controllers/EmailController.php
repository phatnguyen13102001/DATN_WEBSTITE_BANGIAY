<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Social;
use App\Models\logo;
use App\Models\Policies;
use App\Models\Manufacturer;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
class EmailController extends Controller
{
    public function create()
    {
      $mangxh=Social::all();
      $lstlogo = Logo::first();
      $chinhsach = Policies::all();
      $hangsx = Manufacturer::all();
      $lstsetting = Setting::all();
      foreach ($lstsetting as $setting) {
      }
      return View::make('user.contact.index', compact('mangxh','setting', 'lstlogo', 'hangsx', 'chinhsach'))->nest('user.layoutuser.footer', 'user.contact.index', compact('mangxh','setting', 'lstlogo', 'hangsx', 'chinhsach'));
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
          'email' => 'required|email',
          'phone' => 'required',
          'address' => 'required',
          'topic' => 'required',
          'content' => 'required',
        ]);

        $data = [
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
          'topic' => $request->topic,
          'content' => $request->content,
        ];

        Mail::send('email-template', $data, function($message) use ($data) {
          $message->to($data['email'])
          ->subject($data['subject']);
        });

        return back()->with(['message' => 'Email successfully sent!']);
    }
}
