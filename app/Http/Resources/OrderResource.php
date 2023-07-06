<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\FoodResources;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "customer_name" => $this->customer_name,
            "phone_number" => $this->phone_number,
            "email" => $this->email,
            "address" => $this->address,
            "food" => new FoodResource($this->whenLoaded("food")),
            "status" => $this->statusToString($this->status),
            "remark" => $this->remark ?? "",
        ];
    }
    
    private function statusToString($status) {
        if ($status === 1) return "Pending";

        if ($status === 2) return "Accepted";

        if ($status === 3) return "Rejected";

        if ($status === 4) return "Done";
    }
}
