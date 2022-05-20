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

    public function updateImage($request, $path, $name, $data, $url)
    {
        $image = null;

        if($request->file($name)){
            Storage::disk('local')->delete($path. basename($data->image));
            $data->update([
                $name => $url,
            ]);
        }

        return $image;
    }
}
