<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Webinfo;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {

        return view('frontend.pages.index');
    }

    public function pdfView($data)
    {
        return view('frontend.pages.pdf-view', compact('data'));
    }
}
