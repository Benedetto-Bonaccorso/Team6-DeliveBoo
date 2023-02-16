<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dishes = Auth::user()->restaurants->dishes;

        $orderArray = $dishes->first()->orders()->first()->get();

        $order = collect($orderArray)->sortBy("id");

        //dd($order);

        return view('admin.orders.index', compact("order", "dishes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $data = $request->all();

        $val_data = Validator::make($data, [
            'name' => 'required|',
            'address' => 'required|',
            'phone' => 'required|',
            'totalCart' => 'required|'
        ]);

        if ($val_data->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $val_data->errors()
            ]);
        }

        // $new_lead = new Lead();
        // $new_lead->fill($data);
        // $new_lead->save();

        // Mail::to('ciao@example.it')->send(new NewContact($new_lead));

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
