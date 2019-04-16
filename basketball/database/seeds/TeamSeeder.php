<?php

use Illuminate\Database\Seeder;

use App\Team;
use App\Player;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = ['Spurs', 'Raptors', 'Timberwolves', '76ers', 'Rockets', 'Bucks'];
        foreach ($teams as $team) {
            $team = Team::create(['name' => $team]);
            factory(Player::class, 12)->create()->each(function ($player) use ($team) {
                $player->team_id = $team->id;
                $player->save();
            });
        }
    }
}
