<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ['name' => 'Purnea'],
            ['name' => 'Patna'],
            ['name' => 'Gaya'],
            ['name' => 'Bhagalpur'],
            ['name' => 'Muzaffarpur'],
            ['name' => 'Darbhanga'],
            ['name' => 'Munger'],
            ['name' => 'Saharsa'],
            ['name' => 'Katihar'],
            ['name' => 'Araria'],
            ['name' => 'Sitamarhi'],
            ['name' => 'Begusarai'],
            ['name' => 'Samastipur'],
            ['name' => 'Buxar'],
            ['name' => 'Siwan'],
            ['name' => 'Nawada'],
            ['name' => 'Jehanabad'],
            ['name' => 'Aurangabad'],
            ['name' => 'Khagaria'],
            ['name' => 'Madhepura'],
        ];

        foreach ($locations as $location) {
            DB::table('locations')->updateOrInsert(
                ['name' => $location['name']], // ensure distinct names
                ['is_active' => true, 'created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
