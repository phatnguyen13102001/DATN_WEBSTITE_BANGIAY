<?php

namespace App\Http\Controllers\admin;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $manufacturer = Manufacturer::paginate(10);
        if ($request->ajax()) {
            return view('admin.manufacturer.pagination_data', ['lstManufacturer' => $manufacturer]);
        }
        return view('admin.manufacturer.index', ['lstManufacturer' => $manufacturer]);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $lstmanufacturer = Manufacturer::where('name', 'LIKE', '%' . $request->keyword . '%')
                ->paginate(10);
            if ($lstmanufacturer->count() >= 1) {
                return view('admin.manufacturer.pagination_data', ['lstManufacturer' => $lstmanufacturer]);
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
        $lstManufacturer = Manufacturer::all();
        return view('admin.manufacturer.add', [
            'lstManufacturer' => $lstManufacturer
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
                'name' => 'required|unique:manufacturers,name,NULL,id,deleted_at,NULL',
            ],
            [
                'name.required' => 'Tên hãng sản xuất không được bỏ trống',
                'name.unique' => 'Tên hãng sản xuất không được trùng',
            ]
        );

        $manufacturer = new Manufacturer;
        $manufacturer->fill([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
        ]);
        $manufacturer->save();
        return Redirect::route('manufacturer.index');
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
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        return view(
            'admin.manufacturer.edit',
            ['manufacturer' => $manufacturer,]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|unique:manufacturers,name,' . $manufacturer->id . ',id,deleted_at,NULL',
            ],
            [
                'name.required' => 'Tên hãng sản xuất không được bỏ trống',
                'name.unique' => 'Tên hãng sản xuất không được trùng',
            ]
        );

        $manufacturer->fill([
            'name' => $request->input('name'),
        ]);
        $manufacturer->save();
        return Redirect::route('manufacturer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $manu_id = $request->input('deleteting_id');
        $manufacturer = Manufacturer::find($manu_id);
        $manufacturer->delete();
        return Redirect::route('manufacturer.index');
    }
}
