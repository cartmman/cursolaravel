<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    private $orderModel;

    public function __construct(Order $order)
    {
        $this->orderModel = $order;
    }


    public function index()
    {
        $orders = $this->orderModel->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function edit($id)
    {
        $order = $this->orderModel->find($id);

        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = $this->orderModel->find($id);
        $order->status = $request->get('status');
        $order->save();

        return redirect()->route('orders');
    }

}
