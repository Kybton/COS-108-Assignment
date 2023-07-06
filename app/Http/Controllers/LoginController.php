<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class LoginController extends Controller
{
    public function store(Request $reuquest) {
        $data = $reuquest->json()->all();
        
        $validator = Validator::make($data, [
            "name" => "required|string",
            "password" => "required|string"
        ]);


        if($validator->fails()) {
            $error_messages = [];
            $errors = $validator->errors();

            foreach($errors->all() as $message) {
                $error_messages[] = $message;
            }

            return response()->json(["message" => $error_messages], 400);
        }

        $adminExists = Admin::where("name", $data["name"])->first();

        if ($adminExists && Hash::check($data["password"], $adminExists["password"])) {
            return response()->json(["message" => "Login Successful."], 200);
        }

        return response()->json(["message" => "Wrong password."], 400);

    }
}
