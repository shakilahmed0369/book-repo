<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Throwable;

trait ImageTrait{

  public static function MakeImage(Request $request, $fileName, $path, $height=400, $width=400, $quality=80){

    try{
      /**
      * Image resizing and saving in defined dirs
      */
      if( $request->hasFile($fileName) ){
        $image = $request->file($fileName);
        // Extension
        $imageExt = $image->extension();
        // Changing the file name
        $FullImageName = uniqid().'.'.$imageExt;
        // intervention Make image
        $imageResize = Image::make($image->getRealPath());
        // fitting image
        $imageResize->fit( $width, $height );
        // local store path
        $fullPath = public_path($path.$FullImageName);
        // saving image
        $imageResize->save($fullPath, $quality);

        return $fullPath;

      }

    }catch(Throwable $e){

      report($e);

      return false;
    }


  }

}