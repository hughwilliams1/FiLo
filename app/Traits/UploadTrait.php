<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

// Seperate the image uploading logic from controllers into a trait that can be
// used later.
trait UploadTrait {

    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null) {

        //Check if a file name has been passed. If not create one from a rand 10 char sting
        $name = !is_null($filename) ? $filename : Str::random(10);

        //Stroing the file in the right folder + name and on the public area
        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        //Return the new stored file obj
        return $file;
    }
}
