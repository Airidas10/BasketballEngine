<?php

use Illuminate\Database\Seeder;

use App\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matches = [
            [1 => [2, 3, 4, 5, 6]],
            [2 => [1, 3, 4, 5, 6]],
            [3 => [1, 2, 4, 5, 6]],
            [4 => [1, 2, 3, 5, 6]],
            [5 => [1, 2, 3, 4, 6]],
            [6 => [1, 2, 3, 4, 5]],
        ];

        foreach ($matches as $match) {
            foreach($match as $homeId => $opponents){
                foreach ($opponents as $opponentId) {
                    Game::create(['home_team_id' => $homeId, 'away_team_id' => $opponentId]);
                }
            }
        }
        
    }
}
