<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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

        $orderArray = [];
        //ciclo piatti

        foreach ($dishes as $key => $dish) {

            $pivotRecord = DB::table('dish_order')->where([

                'dish_id' =>  $dish['id'],

            ])->first();

            $order_id = $pivotRecord->order_id;

            $orderRecord = DB::table('orders')->where([

                'id' =>  $order_id

            ])->first();
            if (!in_array($orderRecord, $orderArray)) {

                array_push($orderArray, $orderRecord);
            }
        }


        // $orderArray = $dishes->first()->orders()->first()->get();
        $order = collect($orderArray)->sortBy("id");
        // dd($order);

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
        // dd($data)

        // $val_data = Validator::make($data, [
        //     // 'name' => 'required|',
        //     // 'address' => 'required|',
        //     // 'phone' => 'required|',
        //     // 'total_payment' => 'required|'
        // ]);

        // if ($val_data->fails()) {
        //     return response()->json([
        //         'success' => false,
        //         'errors' => $val_data->errors()
        //     ]);
        // }

        $new_order = Order::create($data);
        // $piatti = [];
        // $new_order->dishes()->sync($request->cart);
        foreach ($request->cart as $dish) {
            DB::table('dish_order')->insert([
                'dish_id' =>  $dish['id'],
                'order_id' => $new_order->id,
                'quantity' => $dish['qty']
            ]);
            // $piatti->array_push(get_object_vars($dish));

            // array_push($piatti, $dish);
        }

        // $restaurant->tipologies()->sync([]);


        // if ($request->has('tipologies')) {
        //     $restaurant->tipologies()->sync($request->tipologies);
        // } else {
        //     $restaurant->tipologies()->sync([]);
        // }

        return response()->json([
            'success' => true,
            'data' => $request->all()
            // 'data' => $piatti
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
