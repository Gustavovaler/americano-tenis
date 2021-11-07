<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\PlayerMatch;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    public function getPartidos(Request $request){
        if ($request->ajax()) {
            $partidos = PlayerMatch::all();
            foreach ($partidos as $partido) {
                $partido->player_1 = Player::find( $partido->player_1)->name;
                $partido->player_2 = Player::find( $partido->player_2)->name;
            }
            return $partidos;
        }
        return response('',404);
    }

    public function getPosiciones(Request $request){
        if ($request->ajax()) {
            return [];
        }
        return response('', 404);
    }
}
