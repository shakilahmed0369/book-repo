<?php

namespace App\Http\Livewire\Backend;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;
use File;

class BookTable extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';
  protected $listeners       = ['remove'];
  public $search = '';



  public function updatingSearch()
  {
      $this->resetPage();
  }


  /**
   * Write code on Method
   *
   * @return response()
   */

  public function alertConfirm($bookId)
  {

    $this->dispatchBrowserEvent('swal:confirm', [
      'type'    => 'warning',
      'message' => 'Are you sure?',
      'text'    => 'If deleted, you will not be able to recover the data',
      'roleId'  => $bookId
    ]);
  }

  /**
   * Write code on Method
   *
   * @return response()
   */

  public function remove($bookId)
  {
    if (auth()->guard('admin')->user()->can('delete-Book')) {
        $destroyBook = Book::findOrFail($bookId);
        $destroyBook->delete();
        /* deleting existing pdf file from local */
        File::delete($destroyBook->pdf);
        /* Write Delete Logic */
        $this->dispatchBrowserEvent('swal:modal', [
          'type'    => 'success',
          'message' => 'Role Deleted Successfully!',
          'text'    => 'regret wont be enough ( ͡❛ ₃ ͡❛)'
        ]);
    }
  }


  public function render()
  {
    return view('livewire.backend.book-table', 
    ['books' => Book::where('book_name', 'like', '%'.$this->search.'%')->paginate(20)]);
  }
}
