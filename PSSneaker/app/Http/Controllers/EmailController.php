<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Social;
use App\Models\logo;
use App\Models\Contact;
use App\Models\User;
use App\Models\Policies;
use App\Models\Manufacturer;
use App\Models\Setting;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class EmailController extends Controller
{
  protected function fixImage($product)
  {
    if (Storage::disk('public')->exists($product->image)) {
      $product->image = Storage::url($product->image);
    } else {
      $product->image = '/admin_pssneaker/images/noimage.png';
    }
  }
  public function create()
  {
    $mangxh = Social::where('show', 1)->get();
    $lstlogo = Logo::first();
    $chinhsach = Policies::all();
    $hangsx = Manufacturer::all();
    $lstsetting = Setting::all();
    foreach ($lstsetting as $setting) {
    }
    foreach ($mangxh as $social) {
      $this->fixImage($social);
    }
    $this->fixImage($lstlogo);
    return View::make('user.contact.index', compact('mangxh', 'setting', 'lstlogo', 'hangsx', 'chinhsach'))->nest('user.layoutuser.footer', 'user.contact.index', compact('mangxh', 'setting', 'lstlogo', 'hangsx', 'chinhsach'));
  }
  public function sendEmail(Request $request)
  {
    $validatedData = $request->validate(
      [
        'name'=> 'required',
        'email' => 'required|email',
        'phone'=>'required|min:10|max:11',
        'address'=>'required',
        'topic'=>'required',
        'content'=>'required'
        
      ],
      [
        'name.required' =>'Tên không được bỏ trống',
        'email.required' => 'Email Không Được Bỏ Trống',
        'email.email' => 'Email Không đúng kí tự',
        'phone.required' => 'Số điện thoại Không Được Bỏ Trống',
        'phone.min' => 'Số điện thoại ít nhất 10 số',
        'phone.max' => 'Số điện thoại nhiều nhất 11 số',
        'address.required' => 'địa chỉ Không Được Bỏ Trống',
        'topic.required' => 'Chủ đề Không Được Bỏ Trống',
        'content.required' => 'Nội dung Không Được Bỏ Trống',
      ]
    );
    Mail::send('Email.email', [
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'address' => $request->address,
      'topic' => $request->topic,
      'content' => $request->content,
    ], function ($mail) use ($request) {
      $mail->to('minhsanh.doanlaravel0709@gmail.com');
      $mail->from($request->email, $request->name);
      $mail->subject('Liên hệ');
    });
    return redirect()->guest('lienhe')->with('success','Gửi Mail thành công');
  }
  public function quenmatkhau()
  {
    $mangxh = Social::where('show', 1)->get();
    $lstlogo = Logo::first();
    $chinhsach = Policies::all();
    $hangsx = Manufacturer::all();
    $lstsetting = Setting::all();
    foreach ($lstsetting as $setting) {
    }
    foreach ($mangxh as $social) {
      $this->fixImage($social);
    }
    $this->fixImage($lstlogo);
    return View::make('login.forgetpassword', compact('mangxh', 'setting', 'lstlogo', 'hangsx', 'chinhsach'))->nest('user.layoutuser.footer', 'login.forgetpassword', compact('mangxh', 'setting', 'lstlogo', 'hangsx', 'chinhsach'));
  }
  public function recover_pass(Request $request)
  {
    $validatedData = $request->validate(
      [
        'email' => 'required|email'
      ],
      [
        'email.required' => 'Email Không Được Bỏ Trống',
        'email.email' => 'Email Không đúng kí tự',
      ]
    );
    $data = $request->all();
    $title_mail = "Lấy lại mật khẩu";
    $user = User::where('email', '=', $data['email'])->get();
    foreach ($user as $key => $value) {
      $id = $value->id;
    }
    if ($user) {
      $count_user = $user->count();
      if ($count_user == 0) {
        return redirect()->back()->with('error', 'Email chưa được đăng kí để khôi phục mật khẩu');
      } else {
        $token_random = Str::random();
        $user = User::find($id);
        $user->provider = $token_random;
        $user->save();
        // 
        $to_email = $data['email'];
        $link_reset_pass = url('/update-new-pass?email=' . $to_email . '&token=' . $token_random);
        $data = array("name" => $title_mail, "body" => $link_reset_pass, 'email' => $data['email']);
        Mail::send('login.reset_pass_motify', ['data' => $data], function ($message) use ($title_mail, $data) {
          $message->to($data['email'])->subject($title_mail);
          $message->from($data['email'], $title_mail);
        });
        return redirect()->back()->with('message', 'Gửi mail thành công, vui lòng vào mail để reserpassword');
      }
    }
  }
  public function reset_new_pass(Request $request)
  {
    $validatedData = $request->validate(
      [
        'email' => 'required|email'
      ],
      [
        'email.required' => 'Email Không Được Bỏ Trống',
        'email.email' => 'Email Không đúng kí tự',
      ]
    );
    $data = $request->all();
    $token_random = Str::random();
    $user = User::where('email', '=', $data['email'])->where('provider', '=', $data['token'])->get();
    $count = $user->count();
    if ($count > 0) {
      foreach ($user as $key => $us) {
        $id = $us->id;
      }
      $reset = User::find($id);
      $reset->password = bcrypt($data['password']);
      $reset->provider =  $token_random;
      $reset->save();
      return redirect('dangnhap')->with('success', 'Mật khẩu đã được cập nhật mới. Quay lại đăng nhập');
    } elseif ($count == 0) {
      return redirect()->back()->with('errort', 'Vui lòng nhập mật khẩu mới');
    } else {
      return redirect('recover-password')->with('error', 'Vui lòng nhập lại email vì link quá hạng');
    }
  }
  public function update_new_pass(Request $request)
  {

    $mangxh = Social::where('show', 1);
    $lstlogo = Logo::first();
    $chinhsach = Policies::all();
    $hangsx = Manufacturer::all();
    $lstsetting = Setting::all();
    foreach ($lstsetting as $setting) {
    }
    foreach ($mangxh as $social) {
      $this->fixImage($social);
    }
    $this->fixImage($lstlogo);
    return View::make('login.new_pass', compact('mangxh', 'setting', 'lstlogo', 'hangsx', 'chinhsach'))->nest('user.layoutuser.footer', 'login.new_pass', compact('mangxh', 'setting', 'lstlogo', 'hangsx', 'chinhsach'));
  }
}
