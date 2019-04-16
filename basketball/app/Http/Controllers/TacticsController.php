<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TacticType;
use App\Team;

class TacticsController extends Controller
{
    public function index()
    {
        $tacticTypes = TacticType::with('tactics')->get();

        $team = Team::where('name', 'Timberwolves')->first(); // TODO: Should be users' team
        $opponent = Team::where('name', 'Rockets')->first(); // TODO: Temporary Opponent

        return view('tactics', compact('tacticTypes', 'team', 'opponent'));
    }
}
