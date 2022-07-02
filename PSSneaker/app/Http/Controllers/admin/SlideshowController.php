<?php

namespace App\Http\Controllers\admin;

use App\Models\Slideshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
    public function index(Request $request)
    {
        $lstslideshow = Slideshow::paginate(10);
        foreach ($lstslideshow as $slideshow) {
            $this->fixImage($slideshow);
        }
        if ($request->ajax()) {
            return view('admin.slideshow.pagination_data', ['lstslideshow' => $lstslideshow]);
        }
        return view('admin.slideshow.index', ['lstslideshow' => $lstslideshow]);
    }

    public function search(Request $request)
    {

        $lstslideshow = Slideshow::where('link', 'LIKE', '%' . $request->keyword . '%')
            ->paginate(10);
        foreach ($lstslideshow as $slideshow) {
            $this->fixImage($slideshow);
        }
        if ($request->ajax()) {
            if ($lstslideshow->count() >= 1) {
                return view('admin.slideshow.pagination_data', ['lstslideshow' => $lstslideshow]);
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
        $lstslideshow = Slideshow::all();
        return view('admin.slideshow.add', [
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

        $slideshow = new Slideshow;
        $slideshow->fill([
            'link' => $request->input('link'),
            'image' => '',
            'show' =>
            $request->has('show') ? '1' : '0',
        ]);
        $slideshow->save();
        if ($request->hasFile('image')) {
            $slideshow->image = $request->file('image')->store('images/slideshow/', 'public');
        }
        $slideshow->save();
        return Redirect::route('slideshow.index');
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
    public function update(Request $request, Slideshow $slideshow)
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
            $imagePath = public_path('storage/' . $slideshow->image);
            if (File::exists($imagePath)) {
                if ($imagePath == (public_path('storage/'))) {
                    $image = request()->file('image')->store('images/slideshow/', 'public');
                    $data['image'] = $image;
                    $slideshow->update($data);
                } else {
                    unlink($imagePath);
                }
            }
            $image = request()->file('image')->store('images/slideshow/', 'public');
            $data['image'] = $image;
            $slideshow->update($data);
        }
        $slideshow->update($data);
        return Redirect::route('slideshow.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $slide_id = $request->input('deleteting_id');
        $slideshow = Slideshow::find($slide_id);
        $imagePath = public_path('storage/' . $slideshow->image);
        if (File::exists($imagePath)) {
            if ($imagePath == (public_path('storage/'))) {
                $slideshow->delete();
            } else {
                unlink($imagePath);
            }
        }
        $slideshow->delete();
        return Redirect::route('slideshow.index');
    }
}
