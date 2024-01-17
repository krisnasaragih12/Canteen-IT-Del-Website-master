<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                'name' => 'Informasi',
            ],
            [
                'id' => 2,
                'name' => 'Makanan',
            ],
            [
                'id' => 3,
                'name' => 'Laporan Ditemukan',
            ],
            [
                'id' => 4,
                'name' => 'Laporan Kehilangan',
            ],
        );
        foreach ($data as $d) {
            Category::create([
                'id' => $d['id'],
                'name' => $d['name'],
            ]);
        }
    }
}
