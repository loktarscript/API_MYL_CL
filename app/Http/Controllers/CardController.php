<?php

namespace App\Http\Controllers;

use App\Models\card as Card;
use App\Models\Editions;
use Illuminate\Http\Request;
use Http;

class CardController extends Controller
{
    public function getCardAPIList(Request $request){
        // return env('BASE_URL') . '/cards/edition/undefined';
        // $response = Http::withOptions(['verify' => false])->post(env('BASE_URL') . '/cards/edition/undefined');
        $response = Http::withOptions(['verify' => false])->post(env('BASE_URL') . '/cards/edition/todas');
        return $response;
    }
    
    // Registro de cartas, este método hará sync una vez a la semana.
    public function syncCardsDb(Request $request){
        $listCards = $this->getCardAPIList($request);
        // return $listCards;
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
                    // 'slug_edition' => $this->syncEditions($card['ed_slug']),
                    'fk_edition' => $this->syncEditions($card['ed_slug']),
                ]);
            }
        }
        return Card::get();
    }

    // Esto se ejecuta una vez actualizado el registro de cartas
    protected function syncEditions($card_slug){
        // $uniqueValues = Card::select('slug_edition')->distinct()->get();
        if(!Editions::where('slug', $card_slug)->exists()){
            $edition = Editions::create([
                'name' => $card_slug,
                'slug' => $card_slug,
            ]);
            return $edition->id;
        }else{
            $edition = Editions::where('slug', $card_slug)->first();
            return $edition->id;
        }
    }

    public function getCards(){
        return Card::get();
    }
    // https://api.myl.cl/static/cards/' + $scope.edition.id + '/' + $scope.details.edid + '.png'
    // https://api.myl.cl
}

