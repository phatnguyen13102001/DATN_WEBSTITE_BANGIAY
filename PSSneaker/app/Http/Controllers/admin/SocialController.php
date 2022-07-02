<?php

namespace App\Http\Controllers\admin;

use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
    public function index(Request $request)
    {
        $lstsocial = Social::paginate(10);
        foreach ($lstsocial as $social) {
            $this->fixImage($social);
        }
        if ($request->ajax()) {
            return view('admin.social.pagination_data', ['lstsocial' => $lstsocial]);
        }
        return view('admin.social.index', ['lstsocial' => $lstsocial]);
    }
    public function search(Request $request)
    {

        $lstsocial = Social::where('link', 'LIKE', '%' . $request->keyword . '%')
            ->paginate(10);
        foreach ($lstsocial as $social) {
            $this->fixImage($social);
        }
        if ($request->ajax()) {
            if ($lstsocial->count() >= 1) {
                return view('admin.social.pagination_data', ['lstsocial' => $lstsocial]);
            } else {
                return response()->json([
                    'status' => 'Không có dữ liệu',
                ]);
            }
        }
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
        $url = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $validatedData = $request->validate(
            [
                'link' => 'required|regex:' . $url,
                'image' => 'required',
            ],
            [
                'link.regex' => 'Link Không Hợp Lệ',
                'link.required' => 'Link Không Được Bỏ Trống',
                'image.required' => 'Hình Ảnh Không Được Bỏ Trống',
            ]
        );

        $social = new Social;
        $social->fill([
            'link' => $request->input('link'),
            'image' => '',
            'show' =>
            $request->has('show') ? '1' : '0',
        ]);
        $social->save();
        if ($request->hasFile('image')) {
            $social->image = $request->file('image')->store('images/social/', 'public');
        }
        $social->save();
        return Redirect::route('social.index');
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
        $url = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $validatedData = $request->validate(
            [
                'link' => 'required|regex:' . $url,
            ],
            [
                'link.regex' => 'Link Không Hợp Lệ',
                'link.required' => 'Link Không Được Bỏ Trống',
            ]
        );
        $data = [
            'link' => $request->input('link'),
            'show' =>
            $request->has('show') ? '1' : '0',
        ];
        if (request()->hasFile('image')) {
            $imagePath = public_path('storage/' . $social->image);
            if (File::exists($imagePath)) {
                if ($imagePath == (public_path('storage/'))) {
                    $image = request()->file('image')->store('images/social/', 'public');
                    $data['image'] = $image;
                    $social->update($data);
                } else {
                    unlink($imagePath);
                }
            }
            $image = request()->file('image')->store('images/social/', 'public');
            $data['image'] = $image;
            $social->update($data);
        }
        $social->update($data);
        return Redirect::route('social.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $social_id = $request->input('deleteting_id');
        $social = Social::find($social_id);
        $imagePath = public_path('storage/' . $social->image);
        if (File::exists($imagePath)) {
            if ($imagePath == (public_path('storage/'))) {
                $social->delete();
            } else {
                unlink($imagePath);
            }
        }
        $social->delete();
        return Redirect::route('social.index');
    }
}
