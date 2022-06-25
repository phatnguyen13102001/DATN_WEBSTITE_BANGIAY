<?php

namespace App\Http\Controllers;

use App\Models\Slideshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class SlideshowController extends Controller
{
    protected function fixImage(Slideshow $slideshow)
    {
        if (Storage::disk('public')->exists($slideshow->image)) {
            $slideshow->image = Storage::url($slideshow->image);
        } else {
            $slideshow->image = '/Images/NoImage.jpg';
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstslideshow = Slideshow::all();
        foreach ($lstslideshow as $slideshow) {
            $this->fixImage($slideshow);
        }
        return view('admin.slideshow.index', ['lstslideshow' => $lstslideshow]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstslideshow = Slideshow::all();
        return view('admin.slideshow.index', [
            'lstslideshow' => $lstslideshow
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'link' => 'required',
                'image' => 'required',
            ],
            [
                'link.required' => 'Link Không Được Bỏ Trống',
                'image.required' => 'Hình Ảnh Không Được Bỏ Trống',
            ]
        );

        $slideshow = new Slideshow;
        $slideshow->fill([
            'link' => $request->input('link'),
            'image' => '',
            'show' => $request->input('show'),
        ]);
        $slideshow->save();
        if ($request->hasFile('image')) {
            $slideshow->image = $request->file('image')->store('images/slideshow/', 'public');
        }
        $slideshow->save();
        return Redirect::route('slideshow.index', ['slideshow' => $slideshow]);
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
    public function edit(Slideshow $slideshow)
    {
        $this->fixImage($slideshow);
        return view(
            'admin.slideshow.edit',
            ['slideshow' => $slideshow,]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Slideshow $slideshow)
    {
        $validatedData = $request->validate(
            [
                'link' => 'required',
                'image' => 'required',
            ],
            [
                'link.required' => 'Link Không Được Bỏ Trống',
                'image.required' => 'Hình Ảnh Không Được Bỏ Trống',
            ]
        );
        if ($request->hasFile('image')) {
            $slideshow->image = $request->file('image')->store('images/slideshow/', 'public');
        }
        $slideshow->fill([
            'link' => $request->input('link'),
            'show' => $request->has('show'),
        ]);
        $slideshow->save();
        return Redirect::route('slideshow.index', ['slideshow' => $slideshow]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slideshow $slideshow)
    {
        $slideshow->delete();
        return Redirect::route('slideshow.index');
    }
}
