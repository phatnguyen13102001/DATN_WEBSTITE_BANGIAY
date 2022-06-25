<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $lstManufacturer = Manufacturer::all();
        return view('admin.manufacturer.index', [
            'lstManufacturer' => $lstManufacturer
        ]);
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
                'name' => 'required|unique:manufacturers',
            ],
            [
                'name.required' => 'Tên Hãng Sản Xuất Không Được Bỏ Trống',
                'name.unique' => 'Tên Hãng Sản Xuất Không Được Trùng',
            ]
        );

        $manufacturer = new Manufacturer;
        $manufacturer->fill([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
        ]);
        $manufacturer->save();
        return Redirect::route('manufacturer.index', ['manufacturer' => $manufacturer]);
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
                'name' => 'required|unique:manufacturers,name,NULL,id,deleted_at,NULL',
            ],
            [
                'name.required' => 'Tên Hãng Sản Xuất Không Được Bỏ Trống',
                'name.unique' => 'Tên Hãng Sản Xuất Không Được Trùng',
            ]
        );

        $manufacturer->fill([
            'name' => $request->input('name'),
        ]);
        $manufacturer->save();
        return Redirect::route('manufacturer.index', ['manufacturer' => $manufacturer]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();
        return Redirect::route('manufacturer.index');
    }
}
