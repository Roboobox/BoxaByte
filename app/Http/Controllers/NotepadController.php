<?php

namespace App\Http\Controllers;

use App\Models\Notepad;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NotepadController extends Controller
{
    public function index(Notepad $notepad = null) {
        if (!$notepad) {
            $notepad = Notepad::firstOrCreate([
                'is_default' => true,
                'user_id' => Auth::user()->id
            ],
            [
                'name' => 'Default note',
                'hash' => $this->generateNotepadHash()
            ]
            );
        }
        if ($notepad->user_id === Auth::user()->id || (now()->lessThan(Carbon::parse($notepad->shared_until)) && $notepad->shared_until != NULL)) {
            $userNotepads = Notepad::where('user_id', Auth::user()->id)->get();
            $isShared = false;
            if ($notepad->shared_until !== null && now()->lessThan(Carbon::parse($notepad->shared_until ?? now()))) {
                $isShared = true;
            }
            return view('notepad', [
                'notepad' => $notepad,
                'userNotepads' => $userNotepads,
                'shared' => $isShared
            ]);
        }
        return redirect()->route('home');
    }

    public function create(Request $request) {
        $request->validate([
            'title' => 'required|max:255|string'
        ]);

        $hash = $this->generateNotepadHash();
        if ($hash != null) {
            $note = Notepad::create([
                'hash' => $hash,
                'name' => $request->input('title'),
                'user_id' => Auth::user()->id
            ]);
            return redirect()->route('notepad', ['notepad' => $note->hash]);
        }
        return redirect()->back()->withErrors(['general' => 'Something went wrong, try again later!'])->withInput();
    }

    public function delete(Notepad $notepad) {
        if ($notepad->user_id === Auth::user()->id && !$notepad->is_default) {
            if ($notepad->delete()) {
                return redirect()->route('notepad');
            }
        }
        return redirect()->back()->withErrors(['general' => 'Something went wrong, try again later!']);
    }


    public function update(Request $request) {
        if ($request->input('key')) {
            $hash = $request->input('key');
            $notepad = Notepad::where('user_id', Auth::user()->id)
                ->where('hash', $hash)
                ->where('is_default', false)
                ->first();
            if (!$notepad) {
                return response()->json([
                    'status' => 'error'
                ]);
            }
            $update = Notepad::where('user_id', Auth::user()->id)->where('hash', $hash);
            if ($request->input('content')) {
                $validator = \Validator::make($request->all(), [
                    'content' => 'required|max:65000|string'
                ]);
                if (!$validator->fails()) {
                    $update->update( [ 'content' => $request->input( 'content' ) ] );
                }
            }
            else if ($request->input('name')) {
                $validator = \Validator::make($request->all(), [
                    'name' => 'required|max:255|string|min:1'
                ]);
                if (!$validator->fails()) {
                    $update->update( [ 'name' => $request->input( 'name' ) ] );
                }
            }
            else if ($request->input('bg_color') && $request->input('txt_color')) {
                $validator = \Validator::make($request->all(), [
                    'bg_color' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
                    'txt_color' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/']
                ]);
                if (!$validator->fails()) {
                    $update->update( [ 'bg_color' => $request->input( 'bg_color' ), 'txt_color' => $request->input( 'txt_color' ) ] );
                }
            }
            else if ($request->input('share_time')) {
                $validator = \Validator::make($request->all(), [
                    'share_time' => 'required|integer|in:1,24,168,-1'
                ]);
                if (!$validator->fails()) {
                    if ((int)$request->input('share_time') == -1) {
                        $sharedUntil = Carbon::now()->subSecond();
                    } else
                    {
                        $sharedUntil = Carbon::now()->addHours( (int)$request->input( 'share_time' ) );
                    }
                    $update->update([
                        'shared_until' => $sharedUntil
                    ]);
                    if ($sharedUntil <= Carbon::now()) {
                        $sharedUntil = "Not shared";
                    } else {
                        $sharedUntil = $sharedUntil->format('Y-m-d H:i:s');
                    }
                    if ($update) {
                        return response()->json([
                            'status' => 'success',
                            'shared_until' => $sharedUntil
                        ]);
                    }
                }
            }

            if ($update) {
                return response()->json([
                    'status' => 'success'
                ]);
            }
        }
        return response()->json([
            'status' => 'error'
        ]);
    }

    private function generateNotepadHash() {
        $tryLimit = 20;
        $try = 1;

        while ($try <= $tryLimit) {
            $hash = Str::random(20);
            $notepadExists = Notepad::where('hash', $hash)->first();
            if ($notepadExists === null) {
                return $hash;
            }
        }
        return null;
    }
}
