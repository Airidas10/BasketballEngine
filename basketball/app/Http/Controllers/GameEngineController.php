<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class GameEngineController extends Controller
{
    public function callPython()
    {
        $process = new Process("python3 '/vagrant/engine/isolation.py'");
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $result = $process->getOutput();

        \Log::debug($result);
    }
}




