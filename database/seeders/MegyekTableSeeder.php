<?php

namespace Database\Seeders;

use App\Models\Megyek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MegyekTableSeeder extends Seeder
{
    const ITEMS = [
        'Nógrád',
        'Vas',
        'Fejér',
        

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::ITEMS as $item) {
            $entity = new Megyek(['name' => $item]);
            $entity->save();
        }
    }
}
