<?php
namespace App\Http\Controllers;
use App\Models\News;
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
    public function index()
    {
        $lstnews = News::all();
        foreach ($lstnews as $news) {
            $this->fixImage($news);
        }
        return view('admin.news.index', ['lstnews' => $lstnews]);
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
                'image' => 'required',
                'describe' => 'required',
                'content' => 'required',
            ],
            [
                'name.required' => 'name Không Được Bỏ Trống',
                'image.required' => 'Hình Ảnh Không Được Bỏ Trống',
                'describe.required' => 'describe Không Được Bỏ Trống',
                'content.required' => 'content Không Được Bỏ Trống',
            ]
        );
        $news = new News;
        $news->fill([
            'name' => $request->input('name'),
            'image' => '',
            'describe' => $request->input('describe'),
            'content' => $request->input('content'),
            'show'=> '1',
            'outstanding' => '1',
        ]);
        $news->save();
        if ($request->hasFile('image')) {
            $news->image = $request->file('image')->store('images/news/', 'public');
        }
        $news->save();
        return Redirect::route('news.index', ['news' => $news]);
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
    public function update(Request $request,News $news)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                // 'image' => 'required',
                'describe' => 'required',
                'content' => 'required',
            ],
            [
                'name.required' => 'name Không Được Bỏ Trống',
                // 'image.required' => 'Hình Ảnh Không Được Bỏ Trống',
                'describe.required' => 'describe Không Được Bỏ Trống',
                'content.required' => 'content Không Được Bỏ Trống',
            ]
        );
        if ($request->hasFile('image')) {
            $news->image = $request->file('image')->store('images/news/', 'public');
        }
        $news->fill([
            'name' => $request->input('name'),
            'describe' => $request->input('describe'),
            'content' => $request->input('content'),
            'show'=>'1',
            'outstanding'=>'1'
        ]);
        $news->save();
        return Redirect::route('news.index', ['news' => $news]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return Redirect::route('news.index');
    }
}
