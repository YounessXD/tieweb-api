<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;


class ImageController extends Controller
{
    //
    public function uploaded(Request $request){

        $image = $request->file('image');

 
        $filename = $image->getClientOriginalName();
        $path = $image->storeAs('public/images', $filename);
        echo '<script>';
        echo 'console.log(the data is : '.$image  .')';
        echo '</script>';
        $image = new Image();
        $image->filename = $filename;
        $image->filepath = $path;
        $image->save();
        return response()->json(['success' => true, 'message' => 'Image uploaded successfully']);

        
    }
}
