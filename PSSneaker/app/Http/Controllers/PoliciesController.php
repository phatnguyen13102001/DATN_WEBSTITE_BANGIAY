<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Policies;
use Illuminate\Support\Facades\Redirect;
class PoliciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstpolicy = Policies::all();
        return view('admin.policy.index', [
            'lstpolicy' =>$lstpolicy
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstpolicy = Policies::all();
        return view('admin.policy.add', [
            'lstpolicy' => $lstpolicy
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
                'content'=> 'required',
            ],
            [
                'name.required' => 'Tên chính sách Không Được Bỏ Trống',
                'content.required' => 'Nội dung Không Được Bỏ Trống',
            ]
        );
        $policy= new Policies;
        $policy->fill([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'show'=>'1'
        ]);
        $policy->save();
        return Redirect::route('policy.index', ['policy' => $policy]);
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
    public function edit(Policies $policy)
    {
        return view(
            'admin.policy.edit',
            ['policy' => $policy,]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Policies $policy)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'content'=> 'required',
            ],
            [
                'name.required' => 'Tên chính sách Không Được Bỏ Trống',
                'content.required' => 'Nội dung Không Được Bỏ Trống',
            ]
        );
        $policy->fill([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'show'=>'1'
        ]);
        $policy->save();
        return Redirect::route('policy.index', ['policy' => $policy]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Policies $policy)
    {
        $policy->delete();
        return Redirect::route('policy.index');
    }
}
