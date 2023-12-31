<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $table = "foods";
    public $timestamps = false;

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
