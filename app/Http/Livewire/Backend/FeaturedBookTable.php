<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Book;
class FeaturedBookTable extends Component
{

  use WithPagination;
  protected $paginationTheme = 'bootstrap';
  protected $listeners       = ['remove'];
  public $search = '';



  public function updatingSearch()
  {
      $this->resetPage();
  }


    public function render()
    {
        return view('livewire.backend.featured-book-table',['books' => Book::where('book_name', 'like', '%'.$this->search.'%')->where('featured', 1)->orderBy('id', 'DESC')->paginate(20)]);
    }
}
