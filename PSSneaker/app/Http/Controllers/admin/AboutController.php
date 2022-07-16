<?php

namespace App\Http\Controllers\admin;

use App\Models\About;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    protected function fixImage(About $about)
    {
        if (Storage::disk('public')->exists($about->image)) {
            $about->image = Storage::url($about->image);
        } else {
            $about->image = '/admin_pssneaker/images/noimage.png';
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lstAbout = About::all();
        foreach ($lstAbout as $about) {
            $this->fixImage($about);
        }
        return view('admin.about.index', [
            'about' => $about
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
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required',
            ],
            [
                'title.required' => 'Tiêu đề không được bỏ trống',
            ]
        );
        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ];
        $about->update($data);
        return Redirect::route('about.index', ['about' => $about]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
