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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use  Illuminate\Support\Facades\Session;

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
        foreach ($lsttintuc as $tintuc) {
            $this->fixImage($tintuc);
        }
        foreach ($lstslideshow as $slideshow) {
            $this->fixImage($slideshow);
        }
        $lstproduct = Product::where('outstanding', '1')->orWhere('deleted_at', '=', 'NULL')->get();
        foreach ($lstproduct as $product) {
            $this->fixImage($product);
        }
        foreach ($lstsetting as $setting) {
        }
        return View::make('user.body.index', compact('lstproduct', 'lstslideshow', 'lsttintuc', 'setting', 'hangsx', 'kichthuoc', 'mau', 'chinhsach', 'locspax'))->nest('user.layoutuser.footer', 'user.body.index', compact('lstproduct', 'lstslideshow', 'lsttintuc', 'setting', 'hangsx', 'kichthuoc', 'mau', 'chinhsach', 'locspax'));
    }
    public function getproductdetail($id)
    {
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
        return view('user.product_detail.index', compact('lstproduct', 'setting', 'lstlibrary', 'lststock'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
