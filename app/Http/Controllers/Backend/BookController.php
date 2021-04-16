<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;
use App\Traits\PdfTrait;

class BookController extends Controller
{
    use ImageTrait, PdfTrait;

    public $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
        $this->middleware('admin.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.book.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\BookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['book_cover'] = ImageTrait::MakeImage($request, 'book_cover', 'storage/backend/book-covers/', 500, 331, 60);
        $validatedData['pdf'] = PdfTrait::MakePdf($request, 'pdf', 'storage/backend/pdf/');
        $this->book::create($validatedData);
        toast('Book has been created!', 'success')->width('23rem');
        return redirect()->route('admin.book.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = $this->book::find($id);
        return view('backend.pages.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $update = $this->book::find($id);
        /* more validation and previous files will delete */
        $update->update($request->validate());
        toast('Book has been Update!', 'success')->width('23rem');
        return redirect()->route('admin.book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
