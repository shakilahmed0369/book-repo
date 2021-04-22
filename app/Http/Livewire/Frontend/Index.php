<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
  use WithPagination;

  public $limitPerPage = 30;
  public $search = '';
  protected $listeners = [
      'load-more' => 'loadMore'
  ];
 

  public function updatingSearch()
  {
      $this->resetPage();
  }


  public function loadMore()
  {
      $this->limitPerPage = $this->limitPerPage + 20;
  }

  public function render()
  {
       $books = Book::latest()->where('book_name', 'like', '%'.$this->search.'%')->paginate($this->limitPerPage);

      return view('livewire.frontend.index', ['books' => $books]);  
  }

}
