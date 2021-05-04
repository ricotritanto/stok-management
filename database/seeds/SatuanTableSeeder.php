<?php

use Illuminate\Database\Seeder;
use App\Satuan;

class SatuanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Satuan::create([
            'name' => 'buah'
        ]);
    }
}
