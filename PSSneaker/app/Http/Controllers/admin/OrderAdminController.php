<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Orderstatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class OrderAdminController extends Controller
{
    protected function fixImage($product)
    {
        if (Storage::disk('public')->exists($product->image)) {
            $product->image = Storage::url($product->image);
        } else {
            $product->image = '/admin_pssneaker/images/noimage.png';
        }
    }
    public function index(Request $request)
    {
        $lstorder = Order::paginate(10);
        $lstordertotal1 =
            Order::where('id_orderstatus', '=', '1')->selectRaw("SUM(total) as total1")
            ->groupBy('id_orderstatus')
            ->first();
        $lstordertotal2 =
            Order::where('id_orderstatus', '=', '2')->selectRaw("SUM(total) as total2")
            ->groupBy('id_orderstatus')
            ->first();
        $lstordertotal3 =
            Order::where('id_orderstatus', '=', '3')->selectRaw("SUM(total) as total3")
            ->groupBy('id_orderstatus')
            ->first();
        $lstordertotal4 =
            Order::where('id_orderstatus', '=', '4')->selectRaw("SUM(total) as total4")
            ->groupBy('id_orderstatus')
            ->first();
        $lstorder1 = Order::where('id_orderstatus', '=', '1')->count();
        $lstorder2 = Order::where('id_orderstatus', '=', '2')->count();
        $lstorder3 = Order::where('id_orderstatus', '=', '3')->count();
        $lstorder4 = Order::where('id_orderstatus', '=', '4')->count();
        if ($request->ajax()) {
            return view('admin.order.pagination_data', ['lstorder' => $lstorder]);
        }
        return View::make('admin.order.index', compact('lstorder', 'lstorder1', 'lstordertotal1', 'lstordertotal2', 'lstordertotal3', 'lstordertotal4', 'lstorder2', 'lstorder3', 'lstorder4'));
    }
    public function edit(Order $order)
    {
        $orderstatus = Orderstatus::all();
        $lstorderdetail = Orderdetail::where('id_order', '=', $order->id)->get();
        foreach ($lstorderdetail as $orderdetail) {
            $this->fixImage($orderdetail);
        }

        return view('admin.order.order-detail', compact('order', 'orderstatus', 'lstorderdetail'));
    }
    public function update(Request $request, Order $order)
    {
        $order->fill([
            'id_orderstatus' => $request->get('order_status'),
        ]);
        $order->save();
        return Redirect::route('order.index');
    }
}
