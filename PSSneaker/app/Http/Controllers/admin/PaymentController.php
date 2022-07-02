<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\payment;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lstpayment = Payment::paginate(10);
        if ($request->ajax()) {
            return view('admin.payment.pagination_data', ['lstpayment' => $lstpayment]);
        }
        return view('admin.payment.index', ['lstpayment' => $lstpayment]);
    }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $lstpayment = Payment::where('name', 'LIKE', '%' . $request->keyword . '%')
                ->paginate(10);
            if ($lstpayment->count() >= 1) {
                return view('admin.payment.pagination_data', ['lstpayment' => $lstpayment]);
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
        $lstpayment = Payment::all();
        return view('admin.payment.add', [
            'lstpayment' => $lstpayment
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
                'name.required' => 'Tên chính sách Không Được Bỏ Trống',
            ]
        );
        $payment = new Payment;
        $payment->fill([
            'name' => $request->input('name'),
            'describe' => $request->input('describe'),
            'show' => $request->has('show') ? '1' : '0',
        ]);
        $payment->save();
        return Redirect::route('payment.index');
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
    public function edit(Payment $payment)
    {
        return view(
            'admin.payment.edit',
            ['payment' => $payment,]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Tên chính sách Không Được Bỏ Trống',
            ]
        );
        $payment->fill([
            'name' => $request->input('name'),
            'describe' => $request->input('describe'),
            'show' => $request->has('show') ? '1' : '0',
        ]);
        $payment->save();
        return Redirect::route('payment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $payment_id = $request->input('deleteting_id');
        $payment = Payment::find($payment_id);
        $payment->delete();
        return Redirect::route('payment.index');
    }
}
