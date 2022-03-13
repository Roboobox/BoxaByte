<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use App\Models\File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fileUpload' => 'required|max:10000000',
            'radioExpire' => 'required|in:1,24,48'
        ],
        [
            'radioExpire.in' => 'Incorrect value',
            'radioExpire.required' => 'Save time is required',
            'fileUpload.required' => 'You must upload at least one file'
        ]);

        $hash = $this->createDir();

        if ($hash !== '-') {
            $directory = Directory::create([
                'hash' => $hash,
                'path' => 'files/' . $hash,
                'expiration' => Carbon::now()->addHours((int)$request->input('radioExpire')),
            ]);
            $fileCount = 0;
            foreach ($request->file('fileUpload') as $file) {
                $path = Storage::putFileAs(
                    'files/' . $hash, $file, $file->getClientOriginalName()
                );
                File::create([
                    'path' => $path,
                ]);
                $fileCount++;
            }
            $directory->file_count = $fileCount;
            $directory->save();
        } else {
            return redirect()->back()->withErrors(['general' => 'Something went wrong, try again later!'])->withInput();
        }
        return redirect()->route('directory', ['directory' => $hash]);
    }

    private function createDir(): string {
        $tryLimit = 20;
        $try = 1;

        while ($try <= $tryLimit) {
            $hash = Str::random(20);
            $dirExists = Directory::where('hash', $hash)->first();
            if ($dirExists === null) {
                Storage::disk('local')->makeDirectory('files/' . $hash);
                return $hash;
            }
        }
        return '-';
    }
}
