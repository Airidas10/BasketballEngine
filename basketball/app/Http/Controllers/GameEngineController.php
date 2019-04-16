<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

use App\Player;

class GameEngineController extends Controller
{
    public function startGame(Request $request)
    {
        // \Log::debug($request);

        $response = ['status' => 'error', 'message' => 'Something went wrong'];

        $request->validate([
            // TODO
        ]);

        $tactics = $request->tactics;
        $team1 = $request->team;
        $team2 = $request->opponent;

        $jsonTactics = base64_encode(json_encode($tactics));
        $jsonTeam1 = base64_encode(json_encode($team1));
        $jsonTeam2 = base64_encode(json_encode($team2));

        $process = new Process("python3 '/vagrant/engine/start_game.py' {$jsonTeam1} {$jsonTeam2} {$jsonTactics}");
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $result = $process->getOutput();

        $response = ['status' => 'success', 'message' => $result];

        return $response;
    }
}




