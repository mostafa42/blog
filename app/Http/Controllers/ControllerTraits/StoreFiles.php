<?php

namespace App\Http\Controllers\ControllerTraits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait StoreFiles
{
    // this function will store files at specific folder in public folder
    /**
     * params [ $request , file name , folder path which will store file ]
     * 
     * return file name
     */
    public function store_image(Request $request, $file_name, $path)
    {
        $file = $file_name;
        
        $FileName = date('YmdHi') . $file->getClientOriginalName();

        $file->move(public_path($path), $FileName);
        return $FileName;
    }

}
