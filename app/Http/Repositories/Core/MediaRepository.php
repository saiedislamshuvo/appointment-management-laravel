<?php

namespace App\Http\Repositories\Core;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaRepository {
    public function store($file, $prefix = '') {
        $path = Storage::putFile('public' . $prefix, $file);

        return File::create([
            'user_id' => auth()->id() ?? null,
            'disk' => config('filesystems.default'),
            'filename' => $file->getClientOriginalName(),
            'path' => $path??'',
            'extension' => $file->guessClientExtension() ?? '',
            'mime' => $file->getClientMimeType(),
            'size' => $file->getSize(),
        ]);
    }
}