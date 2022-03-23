<?php

namespace App\Http\Controllers;

use App\Models\MusicCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MusicCommandController extends Controller
{
    public function index() {
        $commands = MusicCommand::orderBy('id', 'desc')->paginate(40);
        $commandCount = $commands->total();

        // Retrieve previous visit counts from cookies
        $cookieCount = Cookie::get('rpi-music-cmd-count') ?? 0;

        // Calculate changes from previous time and now
        $newCount = $commandCount - $cookieCount;

        // Set new cookies
        Cookie::queue(Cookie::forever('rpi-music-cmd-count', $commandCount));

        return view('components.rpi.rpi-music-cmd', [
            'commands' => $commands,
            'title' => 'GjorfildBot Music commands',
            'subtitle' => 'See all music commands issued by bots users',
            'panelCards' => [
                [
                    'title' => 'Total',
                    'count' => $commandCount,
                    'newCount' => $newCount,
                    'icon' => 'fa-solid fa-chart-column',
                    'multiple' => 'commands',
                    'type' => 'normal'
                ]
            ]
        ]);
    }
}
