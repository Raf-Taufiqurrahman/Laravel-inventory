<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasImage
{
    public function uploadImage($request, $path, $name)
    {
        $image = null;

        if($request->file($name)){
            $image = $request->file($name);
            $image->storeAs($path, $image->hashName());
        }

        return $image;
    }

    public function updateImage($path, $name, $data, $url)
    {
        Storage::disk('local')->delete($path. basename($data->image));
        $data->update([
            $name => $url,
        ]);
    }
}
