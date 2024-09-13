<?php

namespace App\Traits;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
trait DashBoardTrait
{
    function store_img($file, $path)  {
        $image = 'upload/'.$path.'/'.Str::uuid().'.'.$file->extension();
        $file->move(public_path('upload/'.$path),$image);
        return $image;
    }


    function delete_img($file)  {
        File::delete($file);
        return 200;
    }
}
