@extends('backend.layouts.master')
@section('content')
<div class="header bg-primary" style="padding-bottom: 150px;"></div>
<div class="container-fluid mt--8">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Add a Book</h3>
            </div>
            <div class="col-4 text-right">
              <a href="" onclick="event.preventDefault()" class="btn btn-sm btn-primary send"><i
                  class="fas fa-save"></i>
                Save</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form class="form" action="{{ route('admin.book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Book Name</label>
                  <input name="book_name" type="text" class="form-control" id="exampleFormControlInput1"
                    placeholder="Book Name" value="{{ $book->book_name }}">
                  @error('book_name')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="">Book Cover</label>
              <div class="custom-file">
                <input
                  onchange="document.getElementById('cover_preview').src = window.URL.createObjectURL(this.files[0])"
                  name="book_cover" type="file" class="custom-file-input" id="customFileLang" lang="en">
                <label class="custom-file-label" for="customFileLang">Book Cover</label>
              </div>
              @error('book_cover')
              <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <label for="" class="">Upload Pdf</label>
            <div class="custom-file">
              <input name="pdf" type="file" class="custom-file-input" id="customFileLang" lang="en">
              <label class="custom-file-label" for="customFileLang">Upload Pdf</label>
            </div>
            @error('pdf')
            <small class="text-danger">{{ $message }}</small>
            @enderror

            <div class="form-group">
              <span>Featured</span>
              <label class="custom-toggle mt-3" style="margin-bottom: -6px;">
                <input value="1" type="checkbox" {{ $book->featured == 1 ? 'checked' : '' }} name="featured">
                <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
              </label>
            </div>
   
            <input class="btn btn-primary" type="submit" value="Create">
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Cover Preview</h3>
            </div>
            <div class="col-4 text-right">
              <a href="" onclick="event.preventDefault()" class="btn btn-sm btn-primary send"><i
                  class="fas fa-save"></i>
                Save</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <img style="object-fit: cover" id="cover_preview" class="img-fluid" width="330px" height="400px"
            src="{{ asset($book->book_cover) }}" alt="">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection