<?php

namespace App\Http\Controllers\admin;

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
    public function index(Request $request)
    {
        $size = Size::paginate(10);
        if ($request->ajax()) {
            return view('admin.size.pagination_data', ['lstsize' => $size]);
        }
        return view('admin.size.index', ['lstsize' => $size]);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $lstsize = Size::where('size', 'LIKE', '%' . $request->keyword . '%')
                ->paginate(10);
            if ($lstsize->count() >= 1) {
                return view('admin.size.pagination_data', ['lstsize' => $lstsize]);
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
                'size' => 'required|numeric|min:1|unique:sizes,size,NULL,id,deleted_at,NULL',

            ],
            [
                'size.required' => 'Size không được bỏ trống',
                'size.unique' => 'Size không được trùng',
                'size.numeric' => 'Size không hợp lệ',
                'size.min' => 'Size phải lớn hơn 1',
            ]
        );
        $size = new Size;
        $size->fill([
            'id' => $request->input('id'),
            'size' => $request->input('size'),
        ]);
        $size->save();
        return Redirect::route('size.index');
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
                'size' => 'required|numeric|min:1|unique:sizes,size,' . $size->id . ',id,deleted_at,NULL',

            ],
            [
                'size.required' => 'Size không được bỏ trống',
                'size.unique' => 'Size không được trùng',
                'size.numeric' => 'Size không hợp lệ',
                'size.min' => 'Size phải lớn hơn 1',
            ]
        );
        $size->fill([
            'size' => $request->input('size'),
        ]);
        $size->save();
        return Redirect::route('size.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $size_id = $request->input('deleteting_id');
        $size = Size::find($size_id);
        $size->delete();
        return Redirect::route('size.index');
    }
}
