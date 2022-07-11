<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Social;
use App\Models\logo;
use App\Models\Contact;
use App\Models\Policies;
use App\Models\Manufacturer;
use App\Models\Setting;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
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
      Mail::send('Email.email',[
        'name'=> $request->name,
        'email'=> $request->email,
        'phone'=> $request->phone,
        'address'=>$request->address,
        'topic'=>$request->topic,
        'content'=>$request->content,
      ], function($mail) use($request){
        $mail->to('minhsanh.doanlaravel0709@gmail.com');
        $mail->from($request->email, $request->name);
        $mail->subject('Liên hệ');
      });
      return redirect()->guest('lienhe');
    }
}
