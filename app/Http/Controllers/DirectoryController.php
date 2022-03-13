<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class DirectoryController extends Controller
{
    public function index(Directory $directory) {
        if (!$directory->deleted && !(now()->greaterThan(Carbon::parse($directory->expiration)))) {
            return view('directory', ['directory' => $directory]);
        } else if (!$directory->deleted && now()->greaterThan(Carbon::parse($directory->expiration))) {
            // Delete expired directory
            if (Storage::disk('local')->deleteDirectory('files/' . $directory->hash)) {
                $directory->deleted = true;
                $directory->save();
            }
        }
        return redirect()->route('home');
    }

    public function delete(Directory $directory) {
        if (!$directory->deleted) {
            if (Storage::disk('local')->deleteDirectory('files/' . $directory->hash)) {
                $directory->deleted = true;
                $directory->save();
            } else {
                return redirect()->back()->withErrors(['general' => 'Something went wrong, try again later!']);
            }
        }
        return redirect()->route('upload');
    }

    public function download(Directory $directory) {
        $zip = new ZipArchive;
        $zipPath = storage_path('app/zips') . '/' . $directory->hash . '.zip';

        $zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $files = File::files(storage_path('app/files/' . $directory->hash));

        foreach ($files as $key => $value) {
            $relativeNameInZipFile = basename($value);
            $zip->addFile($value, $relativeNameInZipFile);
        }

        $zip->close();

        return response()->download($zipPath)->deleteFileAfterSend(true);

    }
}
