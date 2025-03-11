<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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

    public static function imageUrl( ?string $image, string $uploadPath, $size = 40 ): string
    {
        if($image && File::exists(public_path($uploadPath . $image))){
            return asset($uploadPath . $image);
        }
        return (new Helpers)->defaultImage($size);
    }

    public function defaultImage( $size ): string
    {
        return config('app.placeholder').$size.'.png';
    }

    public static function handleFileUpload(Request $request, string $fileName, ?string $existingFile, string $uploadPath): ?string
    {
        if(!$request->hasFile($fileName)){
            return $existingFile; // Return existing file if new one isn't upload
        }
        $file = $request->file($fileName);
        // Delete old file/image if it exists
        if(!empty($existingFile)){
            $oldFilePath = public_path($uploadPath . $existingFile);
            if(File::exists($oldFilePath)){
                File::delete($oldFilePath);
            }
        }
        // Generate new image/file name
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$extension;
        $file->move($uploadPath, $fileName); // Move file to destination
        return $fileName;
    }
}
