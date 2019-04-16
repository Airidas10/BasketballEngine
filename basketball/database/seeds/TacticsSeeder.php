<?php

use Illuminate\Database\Seeder;

use App\Tactic;
use App\TacticType;

class TacticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tacticTypes = [
            'Offense' => [
                ['name' => 'Pick and roll attack','description' => '3 players spread out, while the screener screens the ball handler'],
                ['name' => 'Isolation attack', 'description' => '4 players spread out, while the ball handler goes one on one'],
                ['name' => 'Motion attack', 'description' => 'Players move off the ball to find the best shot'],
                ['name' => 'Low Post attack', 'description' => 'Team looks for the best low post option'],
            ], 

            'Pace' => [
                ['name' => 'Super Slow', 'description' => 'Team looks for a very good shot but plays very slow'],
                ['name' => 'Slow', 'description' => 'Team looks for a good shot but plays slow'],
                ['name' => 'Medium', 'description' => 'ADD LATER'],
                ['name' => 'Fast', 'description' => 'ADD LATER'],
                ['name' => 'Super Fast', 'description' => 'ADD LATER'],
            ],

            'Defense' => [
                ['name' => 'Man to Man', 'description' => 'Standard defense'],
                ['name' => '2-3 Zone', 'description' => 'Zone defense concentrated on limiting driving opportunities'],
                ['name' => '3-2 Zone', 'description' => 'More outside oriented defense'],
            ]
        ];


        foreach ($tacticTypes as $tacticType => $tactics) {
            $tacticType = TacticType::create(['name' => $tacticType]);
            foreach ($tactics as $tactic) {
                Tactic::create($tactic + ['tactic_type_id' => $tacticType->id]);
            }
        }
    }
}
