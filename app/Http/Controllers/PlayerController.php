<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\PlayerMatch;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function store(Request $request){
        $player = new Player();
        $player->name = $request->name;
        $player->zona = $request->zona;
        $player->save();
        return response()->json(['player' => $player]);
    }

    public function autoCalculateMatches(){
        $playersA = Player::where('zona', 'A')->get();
        $playersB = Player::where('zona', 'B')->get();
        $playersC = Player::where('zona', 'C')->get();
        $playersD = Player::where('zona', 'D')->get();

        // $players_grouped = $players->groupBy('zona');
        //$last = null;
        $matched = [];
        $grouped = [ $playersA,$playersB,$playersC,$playersD];
        foreach ($grouped as $players) {


           foreach ($players as $player) {
               foreach ($players as $key) {

                    if ($player->id != $key->id && !in_array($player->id.$key->id,$matched)) {
                        // $last = $player;
                        $match = new PlayerMatch();
                        $match->player_1 = $player->id;
                        $match->player_2 = $key->id;
                        $match->zona = $player->zona;
                        $match->save();
                        array_push($matched,$player->id.$key->id);
                        array_push($matched,$key->id.$player->id);
                        //$last = $player;
                    }
                }
            }
        }
        return $matched;
    }
}
