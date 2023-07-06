<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;

use Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_information = Order::with("food")->get();
        // echo $order_information;
        return new OrderCollection(Order::with('food')->get());
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();

        $validator = Validator::make($data, [
            "customer_name" => "required|string",
            "phone_number" => "required|string",
            "email" => "required|string",
            "address" => "required|string",
            "food_id" => "required|integer",
            "remark" => "nullable|string"
        ]);

        if($validator->fails()) {
            $error_messages = [];
            $errors = $validator->errors();

            foreach($errors->all() as $message) {
                $error_messages[] = $message;
            }

            return response()->json(["message" => $error_messages], 400);
        }
        
        $data["status"] = 1;
        
        $NewOrder = Order::create($data);

        return response()->json(["message" => "Created successfully."], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return new OrderResource($order);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $data = $request->json()->all();
        
        $validator = Validator::make($data, [
            "status" => "required|integer"
        ]);

        if($validator->fails()) {
            $error_messages = [];
            $errors = $validator->errors();

            foreach($errors->all() as $message) {
                $error_messages[] = $message;
            }

            return response()->json(["message" => $error_messages], 400);
        }
        
        $order["status"] = $data["status"];
        $order->save();

        return response()->json(["message" => "Updated successfully."], 200);
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
