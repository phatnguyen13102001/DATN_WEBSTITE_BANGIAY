<?php

namespace App\Http\Controllers;

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
use App\Models\Policies;
use App\Models\Manufacturer;
use App\Models\About;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
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
    public function getindex()
    {
        $locspax = Product::where('outstanding', '1')->orderBy('name', 'ASC')->get();
        $chinhsach = Policies::all();
        $mau = color::all();
        $kichthuoc = Size::all();
        $hangsx = Manufacturer::all();
        $lstsetting = Setting::all();
        $lstslideshow = Slideshow::where('show', '1')->orWhere('deleted_at', '=', 'NULL')->get();
        $lsttintuc = News::where('outstanding', '1')->orWhere('deleted_at', '=', 'NULL')->get();
        $lstproduct = Product::where('outstanding', '1')->orWhere('deleted_at', '=', 'NULL')->paginate(10);
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
        return View::make('user.body.index', compact('lstproduct', 'lstslideshow', 'lsttintuc', 'setting', 'hangsx', 'kichthuoc', 'mau', 'chinhsach', 'locspax'))->nest('user.layoutuser.footer', 'user.body.index', compact('lstproduct', 'lstslideshow', 'lsttintuc', 'setting', 'hangsx', 'kichthuoc', 'mau', 'chinhsach', 'locspax'));
    }
        public function getproductdetail($id)
    {
        $hangsx = Manufacturer::all();
        $chinhsach = Policies::all();
        $lstsetting = Setting::all();
        $lstproduct = Product::find($id);
        $lstlibrary = Library::where('id_product', '=', $id)->orWhere('deleted_at', '=', 'NULL')->get();
        $lststock = Mapping::where('id_product', '=', $id)->orWhere('deleted_at', '=', 'NULL')->get();
        $this->fixImage($lstproduct);
        foreach ($lstsetting as $setting) {
        }
        foreach ($lstlibrary as $library) {
            $this->fixImage($library);
        }
        foreach ($lststock as $stock) {
        }
        return view('user.product_detail.index', compact('lstproduct', 'setting', 'lstlibrary', 'lststock', 'hangsx', 'chinhsach'));
    }
    public function getabout(){
        $gioithieus= About::all();
        $hangsx = Manufacturer::all();
        $chinhsach = Policies::all();
        $lstsetting = Setting::all();
        foreach($gioithieus as $gioithieu){
        }
        foreach($lstsetting as $setting){
        }
        return view('user.introduce.index', compact('gioithieu','setting','hangsx','chinhsach'));
    }
    public function sapxephang($id){
        $hangsxid = Manufacturer::find($id);
        $chinhsach = Policies::all();
        $lstsetting = Setting::all();
        $lstproduct = Product::where('id','=',$hangsxid);
      
        $this->fixImage($lstproduct);
        return view('user.body.index', compact('lstproduct', 'setting','hangsx', 'chinhsach'));
    }
    public function getpolicesdetail($id)
    {
        $hangsx = Manufacturer::all();
        $chinhsach= Policies::all();
        $listchinhsach = Policies::find($id);
        $lstsetting = Setting::all();
        foreach($lstsetting as $setting){
        }
        return View::make('user.policies.index', compact('hangsx','listchinhsach','setting','chinhsach'));
    }
    // 
    public function getprofile($id){
        $chinhsach= Policies::all();
        $hangsx = Manufacturer::all();
        $taikhoan= User::find($id);
        $lstsetting = Setting::all();
        foreach($lstsetting as $setting){
        }
        return View::make('user.account.index', compact('taikhoan','setting','hangsx','chinhsach'));
    }
}
