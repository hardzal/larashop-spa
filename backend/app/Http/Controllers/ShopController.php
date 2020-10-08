<?php

namespace App\Http\Controllers;

use App\Http\Resources\Cities as CityResourceCollection;
use App\Http\Resources\Provinces as ProvinceResourceCollection;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function provinces() {
        return new ProvinceResourceCollection(Province::get());
    }

    public function cities() {
        return new CityResourceCollection(City::get());
    }
}
