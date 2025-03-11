<?php
namespace App\Helpers;

use Illuminate\Support\Facades\File;

class Helpers
{
    public static function deleteFile(?string $fileName, string $uploadPath): void
    {
        if(!$fileName) return;
        $filePath = public_path($uploadPath . $fileName);
        if(File::exists($filePath)){
            File::delete($filePath);
        }
    }
}
