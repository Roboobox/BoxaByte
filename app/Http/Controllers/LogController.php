<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LogController extends Controller
{
    public function index() {
        $logs = Log::orderBy('id', 'desc')->paginate(40);
        $logCount = $logs->total();
        $logErrorCount = Log::where('log_type', 'ERROR')->count();
        $logInfoCount =  $logCount - $logErrorCount;

        // Retrieve previous visit counts from cookies
        $cookieCount = Cookie::get('rpi-log-count') ?? 0;
        $cookieErrorCount = Cookie::get('rpi-log-error-count') ?? 0;
        $prevInfoCount = $cookieCount - $cookieErrorCount;

        // Calculate changes from previous time and now
        $newCount = $logCount - $cookieCount;
        $newErrorCount = $logErrorCount - $cookieErrorCount;
        $newInfoCount = $logInfoCount - $prevInfoCount;

        // Set new cookies
        Cookie::queue(Cookie::forever('rpi-log-count', $logCount));
        Cookie::queue(Cookie::forever('rpi-log-error-count', $logErrorCount));

        return view('components.rpi.rpi-bot-logs', [
            'logs' => $logs,
            'title' => 'GjorfildBot logs',
            'subtitle' => 'See all Gjorfild bot logs',
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

    public function view(Log $log) {
        return view('components.rpi.rpi-view-log', ['log' => $log]);
    }
}
