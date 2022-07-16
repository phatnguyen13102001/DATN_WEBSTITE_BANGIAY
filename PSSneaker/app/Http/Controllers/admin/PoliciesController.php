<?php

namespace App\Http\Controllers\admin;

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
    public function index(Request $request)
    {
        $policies = Policies::paginate(10);
        if ($request->ajax()) {
            return view('admin.policy.pagination_data', ['lstpolicy' => $policies]);
        }
        return view('admin.policy.index', ['lstpolicy' => $policies]);
    }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $lstpolicy = Policies::where('name', 'LIKE', '%' . $request->keyword . '%')
                ->paginate(10);
            if ($lstpolicy->count() >= 1) {
                return view('admin.policy.pagination_data', ['lstpolicy' => $lstpolicy]);
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
                'name' => 'required|unique:policies,name,NULL,id,deleted_at,NULL',
            ],
            [
                'name.required' => 'Tên chính sách không được bỏ trống',
                'name.unique' => 'Tên chính sách không được bỏ trống',
            ]
        );
        $policy = new Policies;
        $policy->fill([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'show' =>
            $request->has('show') ? '1' : '0',
        ]);
        $policy->save();
        return Redirect::route('policy.index');
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
                'name' => 'required|unique:policies,name,' . $policy->id . ',id,deleted_at,NULL',
            ],
            [
                'name.required' => 'Tên chính sách không được bỏ trống',
                'name.unique' => 'Tên chính sách không được bỏ trống',
            ]
        );
        $policy->fill([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'show' => $request->has('show') ? '1' : '0',
        ]);
        $policy->save();
        return Redirect::route('policy.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $policy_id = $request->input('deleteting_id');
        $policy = Policies::find($policy_id);
        $policy->delete();
        return Redirect::route('policy.index');
    }
}
