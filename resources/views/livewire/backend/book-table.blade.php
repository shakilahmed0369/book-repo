<div>
    <!-- Page content -->
      <div class="header bg-primary pb-6"></div>
      <div class="container-fluid mt--6">
        <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0">
                <div class="row">
                  <div class="col-3"><h3 class="mb-0">books</h3></div>
                  <div class="col-md-6 text-center">
                    <input wire:model='search' type="text" value="" placeholder="Live Search" class="">
                  </div>
                <div class="col-3 text-right">
                  @if (auth()->guard('admin')->user()->can('create-Book'))
                  <a href="{{ route('admin.book.create') }}" class="btn-sm btn-success"><b><i class="fas fa-plus"></i> Add book</b></a>
                  @endif
                </div>
                </div>
              </div>
              <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">No.</th>
                      <th scope="col" class="sort" data-sort="budget">Image</th>
                      <th scope="col" class="sort" data-sort="name">Book Name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($books as $book)
                    <tr>
                      <td class="budget"> {{-- counter --}}
                        {{ ++$loop->index }}
                      </td> 

                      <td>
                        <img class="img-fluid" width="100" src="{{ asset($book->book_cover) }}" alt=""></span>
                      </td>

                      <td>
                        <span class="badge badge-dot mr-4">
                          <i class="bg-warning"></i>
                          <span class="status">{{ $book->book_name }}</span>
                        </span>
                      </td>
                      
                      <td class="table-actions">
                        @if (auth()->guard('admin')->user()->can('edit-Book'))
                          <a href="{{ route('admin.book.edit', $book->id) }}" class=" table-action-edit btn-sm btn-primary mr-3" data-toggle="tooltip" data-original-title="Edit book">
                            <i class="fas fa-user-edit"></i> Edit
                          </a>
                        @endif

                        @if (auth()->guard('admin')->user()->can('delete-Book'))
                          <a href="#!" wire:click.prevent="alertConfirm({{ $book->id }})" class="table-action-delete btn-sm btn-danger" data-toggle="tooltip" data-original-title="Delete book">
                            <i class="fas fa-trash"></i> Delete
                          </a>
                        @endif

                      </td>
                    </tr> 
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-footer py-4">
                <nav aria-label="...">
                  <ul class="pagination justify-content-end mb-0">
                    {{ $books->links() }}
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    