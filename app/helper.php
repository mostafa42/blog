<?php
use Illuminate\Http\Request;

if(!function_exists('store_image')){
    function store_image(Request $request, $file_name, $path)
    {
        $file = $file_name;
        
        $FileName = date('YmdHi') . $file->getClientOriginalName();

        $file->move(public_path($path), $FileName);
        return $FileName;
    }
}