<?php

namespace App\Http\Controllers;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
class SocialController extends Controller
{
    protected function fixImage(Social $social)
    {
        if (Storage::disk('public')->exists($social->image)) {
            $social->image = Storage::url($social->image);
        } else {
            $social->image = '/Images/NoImage.jpg';
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstsocial = Social::all();
        foreach ($lstsocial as $social) {
            $this->fixImage($social);
        }
        return view('admin.social.index', ['lstsocial' => $lstsocial]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstsocial = Social::all();
        return view('admin.social.add', [
            'lstsocial' => $lstsocial
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

        $social = new Social;
        $social->fill([
            'link' => $request->input('link'),
            'image' => '',
            'show' => '1',
        ]);
        $social->save();
        if ($request->hasFile('image')) {
            $social->image = $request->file('image')->store('images/social/', 'public');
        }
        $social->save();
        return Redirect::route('social.index', ['social' => $social]);
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
    public function edit(Social $social)
    {
        $this->fixImage($social);
        return view(
            'admin.social.edit',
            ['social' => $social,]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social)
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
            $social->image = $request->file('image')->store('images/social/', 'public');
        }
        $social->fill([
            'link' => $request->input('link'),
            'show' => $request->has('show'),
        ]);
        $social->save();
        return Redirect::route('social.index', ['social' => $social]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
        $social->delete();
        return Redirect::route('social.index');
    }
}
