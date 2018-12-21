<?php

namespace App\Repositories;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Image;

class ImageRepository
{
    public function saveImage($image, $id, $type, $size)
    {
        if (!is_null($image)) {
            $file = $image;
            $extension = $image->getClientOriginalExtension();
            $fileName = time() . random_int(100, 999) . '.' . $extension;
            $destinationPath = public_path('images/' . $type . '/');
            $url = 'https://' . $_SERVER['HTTP_HOST'] . '/images/' . $type . '/' . $fileName;
            $fullPath = $destinationPath . $fileName;
            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775);
            }
            $image = Image::make($file)
                ->encode('jpg');
            $image->save($fullPath, 100);
            return $url;
        } else {
            return 'https://' . $_SERVER['HTTP_HOST'] . '/images/placeholder300x300.jpg';
        }
    }
}
