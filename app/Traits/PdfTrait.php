<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait PdfTrait
{

  public static function MakePdf(Request $request, $fileName, $path)
  {
    try {

      if ($request->hasFile($fileName)) {
        $pdf = $request->file($fileName);
        /* Changing pdf name  */
        $pdfExt      = $pdf->extension();
        $pdfFullName = str_replace(' ', '-', $request->book_name) . '-' . uniqid() . '.' . $pdfExt;
        /* Storing pdf to local storage */
        $fullPath = public_path($path);
        $pdf->move($fullPath, $pdfFullName);
        return $pdfFullName;
      }
    } catch (Throwable $e) {

      report($e);
      return false;
    }
  }
}
