<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use App\Models\Library;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slideshow;
use App\Models\Mapping;
use App\Models\Setting;
use App\Models\User;
use App\Models\News;
use App\Models\Size;
use App\Models\color;
use App\Models\Social;
use App\Models\Logo;
use App\Models\Policies;
use App\Models\Manufacturer;
use App\Models\About;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
class FrontendController extends Controller
{
    protected function fixImage($product)
    {
        if (Storage::disk('public')->exists($product->image)) {
            $product->image = Storage::url($product->image);
        } else {
            $product->image = '/admin_pssneaker/images/noimage.png';
        }
    }
    protected function fixImageslide($slideshow)
    {
        if (Storage::disk('public')->exists($slideshow->image)) {
            $slideshow->image = Storage::url($slideshow->image);
        } else {
            $slideshow->image = '/admin_pssneaker/images/noimage.png';
        }
    }
    public function getindex(Request $request)
    { 
        $locspax = Product::where('outstanding', '1')->orderBy('name', 'ASC')->get();
        $chinhsach = Policies::all();
        $mau = color::all();
        $kichthuoc = Size::all();
        $hangsx = Manufacturer::all();
        $lstsetting = Setting::all();
        $lstlogo = Logo::first();
        $lstslideshow = Slideshow::where('show', '1')->get();
        $lsttintuc = News::where('outstanding', '1')->orWhere('show', '=', '1')->get();
        $lstproduct = Product::where('outstanding', '1')->paginate(9);
        foreach ($lsttintuc as $tintuc) {
            $this->fixImage($tintuc);
        }
        foreach ($lstslideshow as $slideshow) {
            $this->fixImage($slideshow);
        }
        foreach ($lstproduct as $product) {
            $this->fixImage($product);
        }
        foreach ($lstsetting as $setting) {
        }
        $this->fixImage($lstlogo);
        if ($request->ajax()) {
            return View::make('user.body.pagination_data', compact('lstproduct', 'lstlogo', 'lstslideshow', 'lsttintuc', 'setting', 'hangsx', 'kichthuoc', 'mau', 'chinhsach', 'locspax'))->nest('user.layoutuser.footer', 'user.body.index', compact('lstproduct', 'lstlogo', 'lstslideshow', 'lsttintuc', 'setting', 'hangsx', 'kichthuoc', 'mau', 'chinhsach', 'locspax'));
        }
        return View::make('user.body.index', compact('lstproduct', 'lstlogo', 'lstslideshow', 'lsttintuc', 'setting', 'hangsx', 'kichthuoc', 'mau', 'chinhsach', 'locspax'))->nest('user.layoutuser.footer', 'user.body.index', compact('lstproduct', 'lstlogo', 'lstslideshow', 'lsttintuc', 'setting', 'hangsx', 'kichthuoc', 'mau', 'chinhsach', 'locspax'));
    }
    public function getproductdetail($id)
    {
        $lstlogo = Logo::first();
        $hangsx = Manufacturer::all();
        $chinhsach = Policies::all();
        $lstsetting = Setting::all();
        $lstproduct = Product::find($id);
        $lstproductsame = Product::where('id_manufacturer', '=', $lstproduct->id_manufacturer)->whereNotIn('id', [$id])->get();
        $lstlibrary = Library::where('id_product', '=', $id)->orWhere('deleted_at', '=', 'NULL')->get();
        $lststock = Mapping::where('id_product', '=', $id)->orWhere('deleted_at', '=', 'NULL')->get();
        $this->fixImage($lstproduct);
        foreach ($lstsetting as $setting) {
        }
        foreach ($lstproductsame as $productsame) {
            $this->fixImage($productsame);
        }
        foreach ($lstlibrary as $library) {
            $this->fixImage($library);
        }
        foreach ($lststock as $stock) {
        }
        $this->fixImage($lstlogo);
        return view('user.product_detail.index', compact('lstproduct', 'lstproductsame', 'lstlogo', 'setting', 'lstlibrary', 'lststock', 'hangsx', 'chinhsach'));
    }
    public function getproduct()
    {
        $lstlogo = Logo::first();
        $hangsx = Manufacturer::all();
        $chinhsach = Policies::all();
        $lstsetting = Setting::all();
        $lstproduct = Product::where('outstanding', '1')->get();
        foreach ($lstproduct as $product) {
            $this->fixImage($product);
        }
        foreach ($lstsetting as $setting) {
        }
        $this->fixImage($lstlogo);
        return View::make('user.product.index', compact('lstproduct', 'lstlogo', 'setting', 'chinhsach', 'hangsx'));
    }
    public function getproductbymanu($id)
    {
        $lstlogo = Logo::first();
        $hangsx = Manufacturer::all();
        $chinhsach = Policies::all();
        $lstsetting = Setting::all();
        $lstproductbymanu = Product::where('id_manufacturer', $id)->get();
        foreach ($lstproductbymanu as $productbymanu) {
            $this->fixImage($productbymanu);
        }
        foreach ($lstsetting as $setting) {
        }
        $this->fixImage($lstlogo);
        return View::make('user.product.productbymanu', compact('lstproductbymanu', 'lstlogo', 'setting', 'chinhsach', 'hangsx'));
    }

    public function getnews()
    {
        $lstlogo = Logo::first();
        $hangsx = Manufacturer::all();
        $chinhsach = Policies::all();
        $lstsetting = Setting::all();
        $lstnews = News::where('show', '=', '1')->paginate(5);
        foreach ($lstnews as $news) {
            $this->fixImage($news);
        }
        foreach ($lstsetting as $setting) {
        }
        $this->fixImage($lstlogo);
        return View::make('user.news.index', compact('setting', 'chinhsach', 'lstlogo', 'lstnews', 'hangsx'));
    }
    public function getnewsdetail($id)
    {
        $lstlogo = Logo::first();
        $hangsx = Manufacturer::all();
        $chinhsach = Policies::all();
        $lstsetting = Setting::all();
        $lstnewssame = News::whereNotIn('id', [$id])->get();
        $lstnews = News::find($id);
        $this->fixImage($lstnews);
        foreach ($lstsetting as $setting) {
        }
        foreach ($lstnewssame as $newssame) {
            $this->fixImage($newssame);
        }
        $this->fixImage($lstlogo);
        return view('user.news_detail.index', compact('setting', 'hangsx', 'lstlogo', 'chinhsach', 'lstnews', 'lstnewssame'));
    }
    public function getabout()
    {
        $lstlogo = Logo::first();
        $gioithieu = About::first();
        $hangsx = Manufacturer::all();
        $chinhsach = Policies::all();
        $lstsetting = Setting::all();
        $this->fixImage($lstlogo);
        foreach ($lstsetting as $setting) {
        }
        return view('user.introduce.index', compact('gioithieu', 'lstlogo', 'setting', 'hangsx', 'chinhsach'));
    }
    public function sapxephang($id)
    {
        $hangsxid = Manufacturer::find($id);
        $chinhsach = Policies::all();
        $lstsetting = Setting::all();
        $lstproduct = Product::where('id', '=', $hangsxid);

        $this->fixImage($lstproduct);
        return view('user.body.index', compact('lstproduct', 'setting', 'hangsx', 'chinhsach'));
    }
    public function getpolicesdetail($id)
    {
        $lstlogo = Logo::first();
        $hangsx = Manufacturer::all();
        $chinhsach = Policies::all();
        $listchinhsach = Policies::find($id);
        $lstsetting = Setting::all();
        $this->fixImage($lstlogo);
        foreach ($lstsetting as $setting) {
        }
        return View::make('user.policies.index', compact('hangsx', 'lstlogo', 'listchinhsach', 'setting', 'chinhsach'));
    }
    // 
    public function getprofile($id)
    {
        $lstlogo = Logo::first();
        $chinhsach = Policies::all();
        $hangsx = Manufacturer::all();
        $taikhoan = User::find($id);
        $lstsetting = Setting::all();
        $this->fixImage($lstlogo);
        foreach ($lstsetting as $setting) {
        }
        return View::make('user.account.index', compact('taikhoan', 'lstlogo', 'setting', 'hangsx', 'chinhsach'));
    }
   
    public function search(Request $request)
    {

        $lstproduct = Product::where('SKU', 'LIKE', '%' . $request->keyword . '%')->orWhere('name', 'LIKE', '%' . $request->keyword . '%')
            ->paginate(10);
        foreach ($lstproduct as $product) {
            $this->fixImage($product);
        }
        if ($request->ajax()) {
            if ($lstproduct->count() >= 1) {
                return view('user.body.pagination_data', ['lstproduct' => $lstproduct]);
            } else {
                return response()->json([
                    'status' => 'Không có dữ liệu',
                ]);
            }
        }
    }
}
