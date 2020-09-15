<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = "http://api.rajaongkir.com/starter/province?key=0cd19d0c03305b063b01ca91b6258c86";
        $json_text = file_get_contents($url);
        $json_obj = json_decode($json_text);
        $provinces = [];

        foreach($json_obj->rajaongkir->results as $province) {
            $provinces[] = [
                'id' => $province->province_id,
                'province' => $province->province
            ];
        }

        DB::table('provinces')->insert($provinces);
    }
}
