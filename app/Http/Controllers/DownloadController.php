<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ZipArchive;

class DownloadController extends Controller
{
    public function createZip(Directory $directory) {
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

    public function create(Directory $directory) {
        if ($directory->file_count < 2 && $directory->file_count > 0)
        {
            $files = File::files(storage_path('app/files/' . $directory->hash));
            $file = $files[0];
            return response()->download($file);
        }
        return response()->back()->withErrors(['general' => 'Something went wrong, try again later!']);
    }
}
