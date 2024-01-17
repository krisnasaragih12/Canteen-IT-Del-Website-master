<?php

namespace Database\Seeders;

use App\Models\Allergy;
use Illuminate\Database\Seeder;

class AllergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'id' => 1,
                'name' => 'Cumi-cumi',
            ],
            [
                'id' => 2,
                'name' => 'Ikan teri/ikan asin',
            ],
            [
                'id' => 3,
                'name' => 'Udang',
            ],
            [
                'id' => 4,
                'name' => 'Telur',
            ],
            [
                'id' => 5,
                'name' => 'Tahu-tempe',
            ],
            [
                'id' => 6,
                'name' => 'Ikan Laut',
            ],
        );
        foreach ($data as $d) {
            Allergy::create([
                'id' => $d['id'],
                'name' => $d['name'],
            ]);
        }
    }
}
