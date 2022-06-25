<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Size;
class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstsize = Size::all();
        return view('admin.size.index', [
            'lstsize' =>$lstsize
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstsize = Size::all();
        return view('admin.size.add', [
            'lstsize' => $lstsize
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
                'size' => 'required',
            ],
            [
                'size.required' => 'Tên Size Không Được Bỏ Trống',
            ]
        );
        $size = new Size;
        $size->fill([
            'id' => $request->input('id'),
            'size' => $request->input('size'),
        ]);
        $size->save();
        return Redirect::route('size.index', ['size' => $size]);
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
    public function edit(Size $size)
    {
        return view(
            'admin.size.edit',
            ['size' => $size,]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $validatedData = $request->validate(
            [
                'size' => 'required',
               
            ],
            [
                'size.required' => 'Số size Không Được Bỏ Trống',
               
            ]
        );
        $size->fill([
            'size' => $request->input('size'),
        ]);
        $size->save();
        return Redirect::route('size.index', ['size' => $size]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return Redirect::route('size.index');
    }
}