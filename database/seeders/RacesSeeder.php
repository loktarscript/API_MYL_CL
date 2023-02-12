<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Races;
class RacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        $json = File::get(resource_path("races.json"));
        $data = json_decode($json, true);
        $races = $data['races'];
        foreach ($races as $item) {
            Races::create([
                'name' => $item['name'],
                'slug' => $item['slug'],
                'id' => $item['id'],
            ]);
        }
    }
}
