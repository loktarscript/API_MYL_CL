<?php

namespace App\Http\Controllers;

use App\Models\card as Card;
use Illuminate\Http\Request;
use Http;

class CardController extends Controller
{
    public function getCardList(Request $request){
        // return env('BASE_URL') . '/cards/edition/undefined';
        $response = Http::withOptions(['verify' => false])->post(env('BASE_URL') . '/cards/edition/undefined');
        return $response;
    }
    
    public function syncCardsDb(Request $request){
        $listCards = $this->getCardList($request);
        foreach ($listCards['cards'] as $key => $card) {
            # code...
            if(!Card::where('id_myl_api', $card['id'])->exists()){
                Card::create([
                    'id_myl_api' => $card['id'],
                    'eid_myl_api' => $card['edid'],
                    'slug' => $card['slug'],
                    'name' => $card['name'],
                    'fk_raritie_card' => $card['rarity'],
                    'fk_race' => $card['race'],
                    'fk_type_card' => $card['type'],
                    'cost' => $card['cost'],
                    'damage' => $card['damage'],
                    'ability' => $card['ability'],
                    'slug_edition' => $card['ed_slug']
                ]);
            }
        }
        return Card::get();
    }
    // https://api.myl.cl/static/cards/' + $scope.edition.id + '/' + $scope.details.edid + '.png'
    // https://api.myl.cl
}

