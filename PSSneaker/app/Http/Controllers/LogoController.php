<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    protected function fixImage(Logo $logo)
    {
        if (Storage::disk('public')->exists($logo->image)) {
            $logo->image = Storage::url($logo->image);
        } else {
            $logo->image = '/admin_pssneaker/images/noimage.png';
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstLogo = Logo::all();
        foreach ($lstLogo as $logo) {
            $this->fixImage($logo);
        }
        return view('admin.logo.index', [
            'logo' => $logo
        ]);
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
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit(Logo $logo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logo $logo)
    {
        $validatedData = $request->validate(
            [
                'image' => 'required',
            ],
            [
                'image.required' => 'Logo Không Được Bỏ Trống',
            ]
        );
        if (request()->hasFile('image')) {
            $imagePath = public_path('storage/' . $logo->image);
            if (File::exists($imagePath)) {
                if ($imagePath == (public_path('storage/'))) {
                    $image = request()->file('image')->store('images/logo/', 'public');
                    $data['image'] = $image;
                    $logo->update($data);
                } else {
                    unlink($imagePath);
                }
            }
            $image = request()->file('image')->store('images/logo/', 'public');
            $logo->image = $image;
            $logo->save();
        }
        return Redirect::route('logo.index', ['logo' => $logo]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        //
    }
}
