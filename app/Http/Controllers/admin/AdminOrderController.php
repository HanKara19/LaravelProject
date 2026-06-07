<?php

namespace App\Http\Controllers\admin;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $status = $request->status;

    $orders = Order::with('user')
        ->when($status, function ($query) use ($status) {
            $query->where('status', $status);
        })
        ->latest()
        ->get();

    return view('admin.orders.index', compact('orders', 'status'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
{
    $order->load('user', 'items.product');

    return view('admin.orders.show', compact('order'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
{
    $order->status = $request->status;
    $order->save();

    return redirect(route('admin.orders.index'))
        ->with('success', 'Order status updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
{
    $order->delete();

    return redirect(route('admin.orders.index'))
        ->with('success', 'Order deleted successfully.');
}
}
