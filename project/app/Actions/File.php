<?php

namespace App\Actions;

use Illuminate\Support\Facades\Storage;

class File
{

    public static function upload($file, $path)
    {
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        Storage::putFileAs("public/$path", $file, $fileName);

        return "storage/$path/" . $fileName;
    }

    public static function update($file, $OldImgPath, $path)
    {
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        Storage::putFileAs("public/$path", $file, $fileName);

        if (file_exists($OldImgPath)) {
            unlink($OldImgPath);
        }

        return "storage/$path/" . $fileName;
    }

    public static function delete($modelIns)
    {
        if (file_exists($modelIns->image)) {
            unlink($modelIns->image);
        }
        $modelIns->delete();
    }

    public static function deleteFile($file)
    {
        if (file_exists($file)) {
            unlink($file);
        }
    }
}
