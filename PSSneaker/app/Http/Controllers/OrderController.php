<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Manufacturer;
use App\Models\Setting;
use App\Models\Policies;
use App\Models\Logo;
use App\Models\Payment;
use App\Models\Social;
use App\Models\City;
use App\Models\Mapping;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Cart;

class OrderController extends Controller
{
    protected function fixImage($logo)
    {
        if (Storage::disk('public')->exists($logo->image)) {
            $logo->image = Storage::url($logo->image);
        } else {
            $logo->image = '/admin_pssneaker/images/noimage.png';
        }
    }
    public function insertOrder(Request $request)
    {
        $mangxh= Social::all();
        $lstcity = City::pluck("name", "id");
        $lstpayment = Payment::where('show', '=', '1')->get();
        $chinhsach = Policies::all();
        $hangsx = Manufacturer::all();
        $lstsetting = Setting::all();
        $lstlogo = Logo::first();
        foreach ($lstsetting as $setting) {
        }
        foreach ($lstpayment as $payment) {
        }
        $this->fixImage($lstlogo);
        $validatedData = $request->validate(
            [
                'payments' => 'required',
                'name' => 'required',
                'phone' => 'required|numeric',
                'email' => 'required|email',
                'city' => 'required',
                'district' => 'required',
                'ward' => 'required',
                'address' => 'required',
            ],
            [
                'name.required' => 'Tên Không Được Bỏ Trống',
                'payments.required' => 'Vui Lòng Chọn Hình Thức Thanh Toán',
                'phone.required' => 'Phone Không Được Bỏ Trống',
                'email.required' => 'Email Không Được Bỏ Trống',
                'city.required' => 'Vui Lòng Chọn Tỉnh/Thành Phố',
                'district.required' => 'Vui Lòng Chọn Quận/Huyện',
                'ward.required' => 'Vui Lòng Chọn Phường/Xã',
                'address.required' => 'Địa Chỉ Không Được Bỏ Trống',
                'phone.numeric' => 'Phone Không Hợp Lệ',
                'email.email' => 'Email Không Hợp Lệ',
            ]
        );
        $content1 = Cart::instance(Auth::user())->content();
        foreach ($content1 as $v_content1) {
            $stock = Mapping::select('quantity')->where('id_product', '=', $v_content1->id)->where('id_size', '=', $v_content1->options->size_id)->first();
            if (($v_content1->qty) > ($stock->quantity)) {
                return view('user.cart.stock_problem', compact('lstlogo', 'setting', 'hangsx', 'chinhsach', 'v_content1', 'stock'));
                // return back()->with('message', 'Sản phẩm ' . ($v_content1->name) . ' Size ' . ($v_content1->options->size) . ' đã vượt quá tồn kho chỉ còn ' . ($stock->quantity) . ' sản phẩm');
            }
        }
        $order = new Order;
        $order->fill([
            'name_customer' => $request->input('name'),
            'id_payment' => $request->input('payments'),
            'id_city' => $request->get('city'),
            'id_district' => $request->get('district'),
            'id_ward' => $request->get('ward'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'note' => $request->input('requirements'),
            'email' => $request->input('email'),
            'total' => str_replace(",", "", $request->input('total')),
            'id_orderstatus' => '1',
            'code' => Str::random(6),
            'id_user' => Auth::user()->id,
        ]);
        $order->save(); 
        $content = Cart::instance(Auth::user())->content();
        $orderdetail = [];
        foreach ($content as $v_content) {
            $orderdetail[] = [
                'id_order' => $order->id,
                'name_color' => $v_content->options->color,
                'quantity' => $v_content->qty,
                'size' => $v_content->options->size,
                'id_product' => $v_content->id,
                'name_product' => $v_content->name,
                'sale_price' => str_replace(",", "", $v_content->price),
                'regular_price' => str_replace(",", "", $v_content->options->regular_price),
                'image' => $v_content->options->image,
                'name_manufacturer' => $v_content->options->manufacturer,
                'SKU' => $v_content->options->SKU,
            ];
            $stock = Mapping::where('id_product', '=', $v_content->id)->where('id_size', '=', $v_content->options->size_id)->first();
            $stock->quantity -= $v_content->qty;
            $stock->save();
        }
        Orderdetail::insert($orderdetail);

        Cart::instance(Auth::user())->destroy();
        return View::make('user.cart.index', compact('lstlogo', 'setting', 'hangsx', 'chinhsach', 'lstcity', 'lstpayment','mangxh'));
    }
}
