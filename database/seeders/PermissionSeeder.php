<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
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
                'name' => 'Izin Tidak Makan',
            ],
            [
                'id' => 2,
                'name' => 'Izin Terlambat Makan',
            ],
            [
                'id' => 3,
                'name' => 'Izin sedang IB/diluar Kampus',
            ],
            [
                'id' => 4,
                'name' => 'Sakit',
            ],
        );
        foreach ($data as $d) {
            Permission::create([
                'id' => $d['id'],
                'name' => $d['name'],
            ]);
        }
    }
}
