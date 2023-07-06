<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FoodCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\FoodResource';
}
