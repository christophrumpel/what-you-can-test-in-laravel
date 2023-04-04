<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CsvUploadController extends Controller
{
    public function __invoke(Request $request)
    {
        $file = $request->file('file');

        Storage::disk('uploads')->put($file->hashName(), $file);
    }
}
