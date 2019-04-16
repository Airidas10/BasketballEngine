<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TacticsSeeder::class);
        
        if(!App::environment('production')){
            $this->call(TeamSeeder::class);
            $this->call(GameSeeder::class);
        } 
    }
}
