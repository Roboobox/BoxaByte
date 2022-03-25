<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index() {
        return view('admin', [
            'users' => User::select(['id', 'email', 'user_verified', 'is_admin'])->get(),
            'directories' => Directory::where('deleted', false)->with('user')->get()
        ]);
    }

    public function setVerification(Request $request) {
        if (!Auth::user()->is_admin) {
            return response()->json([
                'status' => 'error'
            ]);
        }

        $validator = \Validator::make($request->all(), [
            'verified' => 'required|boolean',
            'user' => 'exists:users,id'
        ]);

        if (!$validator->fails() && Auth::user()->id != $request->input('user')) {
            $user = User::find($request->input('user'));
            if ($user) {
                $user->user_verified = (bool)$request->input('verified');
                $update = $user->save();
                if ($update) {
                    return response()->json([
                        'status' => 'success'
                    ]);
                }
            }
        }
        return response()->json([
            'status' => 'error'
        ]);
    }

    public function setAdmin(Request $request) {
        if (!Auth::user()->is_admin) {
            return response()->json([
                'status' => 'error'
            ]);
        }
        $validator = \Validator::make($request->all(), [
            'admin' => 'required|boolean',
            'user' => 'exists:users,id'
        ]);

        if (!$validator->fails() && Auth::user()->id != $request->input('user')) {
            $user = User::find($request->input('user'));
            if ($user) {
                $user->is_admin = (bool)$request->input('admin');
                $update = $user->save();
                if ($update) {
                    return response()->json([
                        'status' => 'success'
                    ]);
                }
            }
        }
        return response()->json([
            'status' => 'error'
        ]);
    }
}
