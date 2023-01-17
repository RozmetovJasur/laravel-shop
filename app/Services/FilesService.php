<?php

namespace App\Services;

use App\Models\Files;
use Illuminate\Support\Str;

class FilesService
{
    public function upload(array $files, mixed $object): void
    {
        foreach ($files as $image) {
            $file = new Files();
            $extension = $image->getClientOriginalExtension();
            $filename = time() . Str::random() . '.' . $extension;
            $file->filesize = $image->getSize();
            $path = $image->storeAs('public/products', $filename);
            $file->name = $image->getClientOriginalName();
            $file->filename = $filename;
            $file->extension = $extension;
            $file->dirname = 'products/';
            $file->mimetype = $image->getClientMimeType();
            $file->status = 1;
            $file->model = $object::class;
            $file->object_id = $object->id;
            $file->save();
        }
    }
}
