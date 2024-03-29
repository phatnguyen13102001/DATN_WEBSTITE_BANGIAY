<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Cart;
use App\Models\Product;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Models\Manufacturer;
use App\Models\Setting;
use App\Models\Social;
use App\Models\Policies;
use App\Models\Logo;
use App\Models\Payment;
use App\Models\Mapping;
use App\Models\Size;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

session_start();

class CartController extends Controller
{
    protected function fixImage($product)
    {
        if (Storage::disk('public')->exists($product->image)) {
            $product->image = Storage::url($product->image);
        } else {
            $product->image = '/admin_pssneaker/images/noimage.png';
        }
    }
    public function addtocart(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->input('productid_hidden');
            $quantity = $request->input('quantity');
            $size = $request->input('option-size');
            $size_name = Size::select('size')->where('id', "=", $size)->first();
            $manufacturer = $request->input('name_manu');
            $SKU = $request->input('SKU');
            $product_info = Product::where('id', $product_id)->first();

            $stock = Mapping::select('quantity')->where('id_product', '=', $product_id)->where('id_size', '=', $size)->first();

            if ($quantity > $stock->quantity) {
                return back()->with('fail', 'Size ' . $size_name->size . ' bạn vừa chọn đã vượt quá tồn kho, chỉ còn ' . $stock->quantity . ' sản phẩm');
            }
            $content = Cart::instance(Auth::user())->content();

            foreach ($content as $v_content) {
                if (($v_content->qty) >= ($stock->quantity) && ($v_content->options->size_id == $size) && ($v_content->id == $product_id)) {
                    return back()->with('fail', 'Size ' . $size_name->size . ' bạn vừa chọn đã vượt quá tồn kho, chỉ còn ' . $stock->quantity . ' sản phẩm');
                }
            }

            $data['id'] = $product_info->id;
            $data['qty'] = $quantity;
            $data['name'] = $product_info->name;
            if ($product_info->sale_price == 0) {
                $data['price'] = $product_info->regular_price;
            } else {
                $data['price'] = $product_info->sale_price;
            }
            $data['weight'] = '0';
            $data['options']['image'] = $product_info->image;
            $data['options']['regular_price'] = $product_info->regular_price;
            $data['options']['size'] = $size_name->size;
            $data['options']['size_id'] = $size;
            $data['options']['color'] = $product_info->color->name;
            $data['options']['manufacturer'] = $manufacturer;
            $data['options']['SKU'] = $SKU;
            Cart::instance(Auth::user());
            Cart::instance(Auth::user())->add($data);

            return back()->with('success', 'Thêm vào giỏ hàng thành công');
        } else {
        }
    }
    public function show_cart()
    {
        $mangxh = Social::where('show', 1)->get();
        $lstcity = City::pluck("name", "id");
        $chinhsach = Policies::all();
        $hangsx = Manufacturer::all();
        $lstsetting = Setting::all();
        $lstpayment = Payment::where('show', '=', '1')->get();
        $lstlogo = Logo::first();
        foreach ($lstsetting as $setting) {
        }
        $this->fixImage($lstlogo);
        foreach ($lstpayment as $payment) {
        }
        foreach ($mangxh as $social) {
            $this->fixImage($social);
        }
        if (Auth::check()) {
            return View::make('user.cart.index', compact('lstlogo', 'setting', 'hangsx', 'chinhsach', 'lstcity', 'lstpayment', 'mangxh'));
        } else {
            return View::make('login.index', compact('lstlogo', 'setting', 'hangsx', 'chinhsach', 'mangxh'));
        }
    }

    public function getDistrict(Request $request)
    {
        $district = District::where("id_city", $request->id_city)->pluck("name", "id");
        return response()->json($district);
    }

    public function getWard(Request $request)
    {
        $ward = Ward::where("id_district", $request->id_district)->pluck("name", "id");
        return response()->json($ward);
    }

    public function delete_to_cart($rowId)
    {
        Cart::instance(Auth::user())->update($rowId, 0);
    }
    public function update_to_cart($rowId, $qty)
    {
        Cart::instance(Auth::user())->update($rowId, $qty);
    }
}
