<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use App\Http\Resources\FoodResource;
use App\Http\Resources\FoodCollection;
use Illuminate\Http\Request;

use Validator;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new FoodCollection(Food::all());
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
            "name" => "required|string",
            "description" => "required|string",
            "price" => "required|integer",
        ]);

        if($validator->fails()) {
            $error_messages = [];
            $errors = $validator->errors();

            foreach($errors->all() as $message) {
                $error_messages[] = $message;
            }

            return response()->json(["message" => $error_messages], 400);
        }

        $NewFood = [
            "name" => $data["name"],
            "description" => $data["description"],
            "price" => $data["price"]
        ];

        $food = Food::create($NewFood);

        return response()->json(["message" => "Created successfully."], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return new FoodResource($food);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $OrderInformation = Order::where("food_id", $food->id)->exists();

        if ($OrderInformation) {
            return response()->json(["message" => "Cannot delete."], 400);
        }
        $food->delete();
        return response()->json(["message" => "Deleted successfully."], 200);
    }
}
