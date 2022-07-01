<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    protected function fixImage(News $news)
    {
        if (Storage::disk('public')->exists($news->image)) {
            $news->image = Storage::url($news->image);
        } else {
            $news->image = '/Images/NoImage.jpg';
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $lstnews = News::paginate(10);
        foreach ($lstnews as $news) {
            $this->fixImage($news);
        }
        if ($request->ajax()) {
            return view('admin.news.pagination_data', ['lstnews' => $lstnews]);
        }
        return view('admin.news.index', ['lstnews' => $lstnews]);
    }

    public function search(Request $request)
    {

        $lstnews = News::where('name', 'LIKE', '%' . $request->keyword . '%')
            ->paginate(10);
        foreach ($lstnews as $news) {
            $this->fixImage($news);
        }
        if ($request->ajax()) {
            if ($lstnews->count() >= 1) {
                return view('admin.news.pagination_data', ['lstnews' => $lstnews]);
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
        $lstnews = News::all();
        return view('admin.news.add', [
            'lstnews' => $lstnews
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
                'name' => 'required',
            ],
            [
                'name.required' => 'name Không Được Bỏ Trống',
            ]
        );
        $news = new News;
        $news->fill([
            'name' => $request->input('name'),
            'image' => '',
            'describe' => $request->input('describe'),
            'content' => $request->input('content'),
            'show' => $request->has('show') ? '1' : '0',
            'outstanding' => $request->has('outstanding') ? '1' : '0',
        ]);
        $news->save();
        if ($request->hasFile('image')) {
            $news->image = $request->file('image')->store('images/news/', 'public');
        }
        $news->save();
        return Redirect::route('news.index');
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
    public function edit(News $news)
    {
        $this->fixImage($news);
        return view(
            'admin.news.edit',
            ['news' => $news,]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'name Không Được Bỏ Trống',
            ]
        );
        $data = [
            'name' => $request->input('name'),
            'describe' => $request->input('describe'),
            'content' => $request->input('content'),
            'show' => $request->has('show') ? '1' : '0',
            'outstanding' => $request->has('outstanding') ? '1' : '0',
        ];
        if (request()->hasFile('image')) {
            $imagePath = public_path('storage/' . $news->image);
            if (File::exists($imagePath)) {
                if ($imagePath == (public_path('storage/'))) {
                    $image = request()->file('image')->store('images/news/', 'public');
                    $data['image'] = $image;
                    $news->update($data);
                } else {
                    unlink($imagePath);
                }
            }
            $image = request()->file('image')->store('images/news/', 'public');
            $data['image'] = $image;
            $news->update($data);
        }
        $news->update($data);
        return Redirect::route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $news_id = $request->input('deleteting_id');
        $news = News::find($news_id);
        $imagePath = public_path('storage/' . $news->image);
        if (File::exists($imagePath)) {
            if ($imagePath == (public_path('storage/'))) {
                $news->delete();
            } else {
                unlink($imagePath);
            }
        }
        $news->delete();
        return Redirect::route('news.index');
    }
}
