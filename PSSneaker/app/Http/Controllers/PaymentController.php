<?php

namespace App\Http\Controllers;
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
    public function index()
    {
        
        $lstpayment = Payment::all();
        return view('admin.payment.index', [
            'lstpayment' =>$lstpayment
        ]);
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
                'describe'=> 'required',
            ],
            [
                'name.required' => 'Tên chính sách Không Được Bỏ Trống',
                'describe.required' => 'Mô tả Không Được Bỏ Trống',
            ]
        );
        $payment= new Payment;
        $payment->fill([
            'name' => $request->input('name'),
            'describe' => $request->input('describe'),
            'show'=>'1'
        ]);
        $payment->save();
        return Redirect::route('payment.index', ['payment' => $payment]);
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
                'describe'=> 'required',
            ],
            [
                'name.required' => 'Tên chính sách Không Được Bỏ Trống',
                'describe.required' => 'Mô tả Không Được Bỏ Trống',
            ]
        );
        $payment->fill([
            'name' => $request->input('name'),
            'describe' => $request->input('describe'),
            'show'=>'1'
        ]);
        $payment->save();
        return Redirect::route('payment.index', ['payment' => $payment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return Redirect::route('payment.index');
    }
}
