<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = "http://api.rajaongkir.com/starter/city?key=0cd19d0c03305b063b01ca91b6258c86";
        $json_text = file_get_contents($url);
        $json_obj = json_decode($json_text);

        $cities = [];

        foreach($json_obj->rajaongkir->results as $city) {
            $cities[] = [
                'id' => $city->city_id,
                'province_id' => $city->province_id,
                'city' => $city->city_name,
                'type' => $city->type,
                'postal_code' => $city->postal_code,
            ];
        }

        DB::table('cities')->insert($cities);
    }
}
