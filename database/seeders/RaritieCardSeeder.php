<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\RaritieCard;

class RaritieCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $json = File::get(resource_path("raritie_card.json"));
        $data = json_decode($json, true);
        $races = $data['rarities'];
        foreach ($races as $item) {
            RaritieCard::create([
                'name' => $item['name'],
                'slug' => $item['slug'],
                'id' => $item['id'],
            ]);
        }
    }
}
