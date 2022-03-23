<?php

namespace App\Http\Controllers;

use App\Models\MusicLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MusicLogController extends Controller
{
    public function index() {
        $musicLogs = MusicLog::orderBy('id', 'desc')->paginate(40);
        $logCount = $musicLogs->total();
        $logErrorCount = MusicLog::where('log_type', 'ERROR')->count();
        $logInfoCount = $logCount - $logErrorCount;

        // Retrieve previous visit counts from cookies
        $cookieCount = Cookie::get('rpi-music-log-count') ?? 0;
        $cookieErrorCount = Cookie::get('rpi-music-log-error-count') ?? 0;
        $prevInfoCount = $cookieCount - $cookieErrorCount;

        // Calculate changes from previous time and now
        $newCount = $logCount - $cookieCount;
        $newErrorCount = $logErrorCount - $cookieErrorCount;
        $newInfoCount = $logInfoCount - $prevInfoCount;

        // Set new cookies
        Cookie::queue(Cookie::forever('rpi-music-log-count', $logCount));
        Cookie::queue(Cookie::forever('rpi-music-log-error-count', $logErrorCount));

        return view('components.rpi.rpi-music-logs', [
            'logs' => $musicLogs,
            'title' => 'GjorfildBot Music logs',
            'subtitle' => 'See all Gjorfild bot music logs',
            'panelCards' => [
                [
                    'title' => 'Errors',
                    'count' => $logErrorCount,
                    'newCount' => $newErrorCount,
                    'icon' => 'fa-solid fa-bug',
                    'multiple' => 'errors',
                    'type' => 'error'
                ],
                [
                    'title' => 'Info',
                    'count' => $logInfoCount,
                    'newCount' => $newInfoCount,
                    'icon' => 'fa-solid fa-info',
                    'multiple' => 'infos',
                    'type' => 'info'
                ],
                [
                    'title' => 'Total',
                    'count' => $logCount,
                    'newCount' => $newCount,
                    'icon' => 'fa-solid fa-chart-column',
                    'multiple' => 'logs',
                    'type' => 'normal'
                ]
            ]
        ]);
    }

    public function view(MusicLog $musicLog) {
        return view('components.rpi.rpi-view-music-log', ['log' => $musicLog]);
    }
}
