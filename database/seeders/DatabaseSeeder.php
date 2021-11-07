<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\PlayerMatch;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $admin = User::create([
            'password' => Hash::make('torneo1121'),
            'email' => 'admin@admin.com',
            'name' => 'Administrador'
        ]);

        $player = Player::create([
            'name' => 'Gustavo Valerio',
            'zona' => 'A'
        ]);
        $player2 = Player::create([
            'name' => 'A. Leguizamon',
            'zona' => 'A'
        ]);
        Player::create([
            'name' => 'Fernando Neira',
            'zona' => 'A'
        ]);
        Player::create([
            'name' => 'Sofia Valerio',
            'zona' => 'B'
        ]);
        Player::create([
            'name' => 'Juan Jorge',
            'zona' => 'B'
        ]);

        PlayerMatch::create([
            'player_1' => $player->id,
            'player_2' => $player2->id,

        ]) ;

    }
}
