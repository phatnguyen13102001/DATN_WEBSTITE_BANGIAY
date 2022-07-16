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
use App\Models\Orderdetail;
use App\Models\About;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
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
        $mangxh= Social::all();
        $chinhsach = Policies::all();
        $mau = color::all();
        $kichthuoc = Size::all();
        $hangsx = Manufacturer::all();
        $lstsetting = Setting::all();
        $lstlogo = Logo::first();
        $lstslideshow = Slideshow::where('show', '1')->get();
        $lsttintuc = News::where('outstanding', '1')->orWhere('show', '=', '1')->get();
        foreach ($lsttintuc as $tintuc) {
            $this->fixImage($tintuc);
        }
        foreach ($lstslideshow as $slideshow) {
            $this->fixImage($slideshow);
        }
        foreach ($lstsetting as $setting) {
        }
        $this->fixImage($lstlogo);

        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'tang_dan') {
                $lstproduct = Product::where('outstanding', '1')->orderBy('sale_price', 'ASC')->paginate(9)->appends(request()->query());
                foreach ($lstproduct as $product) {
                    $this->fixImage($product);
                }
            } else if ($sort_by == 'giam_dan') {
                $lstproduct = Product::where('outstanding', '1')->orderBy('sale_price', 'DESC')->paginate(9)->appends(request()->query());
                foreach ($lstproduct as $product) {
                    $this->fixImage($product);
                }
            } else if ($sort_by == 'kytu_az') {
                $lstproduct = Product::where('outstanding', '1')->orderBy('name', 'ASC')->paginate(9)->appends(request()->query());
                foreach ($lstproduct as $product) {
                    $this->fixImage($product);
                }
            } else if ($sort_by == 'kytu_za') {
                $lstproduct = Product::where('outstanding', '1')->orderBy('name', 'DESC')->paginate(9)->appends(request()->query());
                foreach ($lstproduct as $product) {
                    $this->fixImage($product);
                }
            } else if ($sort_by == "default") {
                $lstproduct = Product::where('outstanding', '1')->orderBy('id', 'DESC')->paginate(9);
                foreach ($lstproduct as $product) {
                    $this->fixImage($product);
                }
            }
        } else {
            $lstproduct = Product::where('outstanding', '1')->orderBy('id', 'DESC')->paginate(9);
            foreach ($lstproduct as $product) {
                $this->fixImage($product);
            }
        }
        return View::make('user.body.index', compact('lstproduct', 'lstlogo', 'lstslideshow', 'lsttintuc', 'setting', 'hangsx', 'kichthuoc', 'mau', 'chinhsach','mangxh'))->nest('user.layoutuser.footer', 'user.body.index', compact('lstproduct', 'lstlogo', 'lstslideshow', 'lsttintuc', 'setting', 'hangsx', 'kichthuoc', 'mau', 'chinhsach','mangxh'));
    }
    public function getproductdetail($id)
    {
        $mangxh= Social::all();
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
        return view('user.product_detail.index', compact('lstproduct', 'lstproductsame', 'lstlogo', 'setting', 'lstlibrary', 'lststock', 'hangsx', 'chinhsach','mangxh'));
    }
    public function getproduct()
    {
        $mangxh= Social::all();
        $lstlogo = Logo::first();
        $hangsx = Manufacturer::all();
        $chinhsach = Policies::all();
        $lstsetting = Setting::all();
        $lstproduct = Product::all();
        foreach ($lstproduct as $product) {
            $this->fixImage($product);
        }
        foreach ($lstsetting as $setting) {
        }
        $this->fixImage($lstlogo);
        return View::make('user.product.index', compact('lstproduct', 'lstlogo', 'setting', 'chinhsach', 'hangsx','mangxh'));
    }
    public function getproductbymanu($id)
    {
        $mangxh= Social::all();
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
        return View::make('user.product.productbymanu', compact('lstproductbymanu', 'lstlogo', 'setting', 'chinhsach', 'hangsx','mangxh'));
    }

    public function getnews()
    {
        
        $mangxh= Social::all();
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
        return View::make('user.news.index', compact('setting', 'chinhsach', 'lstlogo', 'lstnews', 'hangsx','mangxh'));
    }
    public function getnewsdetail($id)
    {
        $mangxh= Social::all();
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
        return view('user.news_detail.index', compact('setting', 'hangsx', 'lstlogo', 'chinhsach', 'lstnews', 'lstnewssame','mangxh'));
    }
    public function getabout()
    {
        
        $mangxh= Social::all();
        $lstlogo = Logo::first();
        $gioithieu = About::first();
        $hangsx = Manufacturer::all();
        $chinhsach = Policies::all();
        $lstsetting = Setting::all();
        $this->fixImage($lstlogo);
        foreach ($lstsetting as $setting) {
        }
        return view('user.introduce.index', compact('gioithieu', 'lstlogo', 'setting', 'hangsx', 'chinhsach','mangxh'));
    }
    public function sapxephang($id)
    {
        
        $mangxh= Social::all();
        $hangsxid = Manufacturer::find($id);
        $chinhsach = Policies::all();
        $lstsetting = Setting::all();
        $lstproduct = Product::where('id', '=', $hangsxid);

        $this->fixImage($lstproduct);
        return view('user.body.index', compact('lstproduct', 'setting', 'hangsx', 'chinhsach','mangxh'));
    }
    public function getpolicesdetail($id)
    {
        
        $mangxh= Social::all();
        $lstlogo = Logo::first();
        $hangsx = Manufacturer::all();
        $chinhsach = Policies::all();
        $listchinhsach = Policies::find($id);
        $lstsetting = Setting::all();
        $this->fixImage($lstlogo);
        foreach ($lstsetting as $setting) {
        }
        return View::make('user.policies.index', compact('hangsx', 'lstlogo', 'listchinhsach', 'setting', 'chinhsach','mangxh'));
    }
    // 
    public function getprofile($id)
    {
        $mangxh= Social::all();
        $lstlogo = Logo::first();
        $chinhsach = Policies::all();
        $hangsx = Manufacturer::all();
        $taikhoan = User::find($id);
        $lstsetting = Setting::all();
        $this->fixImage($lstlogo);
        foreach ($lstsetting as $setting) {
        }
        return View::make('user.account.index', compact('taikhoan', 'lstlogo', 'setting', 'hangsx', 'chinhsach','mangxh'));
    }

    public function search(Request $request)
    {
        $mangxh= Social::all();
        $lstlogo = Logo::first();
        $hangsx = Manufacturer::all();
        $chinhsach = Policies::all();
        $lstsetting = Setting::all();
        foreach ($lstsetting as $setting) {
        }
        $this->fixImage($lstlogo);
        $keywords = $request->keywords_submit;
        $search_product = Product::where('name', 'LIKE', '%' . $keywords . '%')->get();
        foreach ($search_product as $product) {
            $this->fixImage($product);
        }
        return View::make('user.product.search', compact('search_product', 'lstlogo', 'hangsx', 'chinhsach', 'setting','mangxh'));
    }

    public function autocomplete_ajax(Request $request)
    {
        $data = $request->all();
        if ($data['query']) {
            $product = Product::where('name', 'LIKE', '%' . $data['query'] . '%')->get();
            $output = '<ul class="dropdown-menu" style="display:block; margin-left:49px;">';
            foreach ($product as $key => $val) {
                $output .= '<li class="li_search_ajax"><a href="#">' . $val->name . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
    public function showhistory($id){
        $lichsu= Order::where('id_user','=',$id)->get();
        $mangxh= Social::all();
        $lstlogo = Logo::first();
        $hangsx = Manufacturer::all();
        $chinhsach = Policies::all();
        $lstsetting = Setting::all();
        foreach ($lstsetting as $setting) {
        }
        $this->fixImage($lstlogo);
        return View::make('user.account.history', compact('lichsu','lstlogo', 'setting', 'chinhsach', 'hangsx','mangxh'));
    }
    public function showhistorydetail($id){
        $chitietdonhang=Orderdetail::where('id_order','=',$id)->get();
        $mangxh= Social::all();
        $lstlogo = Logo::first();
        $hangsx = Manufacturer::all();
        $chinhsach = Policies::all();
        $lstsetting = Setting::all();
        foreach ($lstsetting as $setting) {
        }
        $this->fixImage($lstlogo);
        return View::make('user.account.historydetail', compact('chitietdonhang','lstlogo', 'setting', 'chinhsach', 'hangsx','mangxh'));
    }
}
