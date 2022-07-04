<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slideshow;
use App\Models\Mapping;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

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
        $lstsetting = Setting::all();
        $lstproduct = Product::where('outstanding', '1')->orWhere('deleted_at', '=', 'NULL')->paginate(9);
        $lstslideshow = Slideshow::where('show', '1')->orWhere('deleted_at', '=', 'NULL')->get();
        foreach ($lstproduct as $product) {
            $this->fixImage($product);
        }
        foreach ($lstslideshow as $slideshow) {
            $this->fixImage($slideshow);
        }
        foreach ($lstsetting as $setting) {
        }
        return View::make('user.body.index', compact('lstproduct', 'lstslideshow', 'setting'))->nest('user.layoutuser.header', 'user.body.index', compact('lstslideshow', 'lstproduct', 'setting'))->nest('user.layoutuser.footer', 'user.body.index', compact('lstslideshow', 'lstproduct', 'setting'));
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
