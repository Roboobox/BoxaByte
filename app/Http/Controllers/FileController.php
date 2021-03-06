<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function index() {
        $userFileDirectories = Directory::where('user_id', Auth::user()->id)
            ->where('deleted', false)
            ->where(function ($query) {
                $query->where('expiration', '>', Carbon::now())
                    ->orWhereNull('expiration');
            })
            ->with('files')
            ->get();
        return view('files', ['directories' => $userFileDirectories]);
    }
}
