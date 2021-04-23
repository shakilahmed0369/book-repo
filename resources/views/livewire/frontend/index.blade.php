<div>
  <ul class="text-center">
    @forelse ($books as $book)
      <li><img src="{{ $book->book_cover ? asset($book->book_cover) : 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/881020/book10.jpg' }}" alt=""></li>
    @empty
      <div class="text-center text-light">No Books found :(</div>
    @endforelse
  
    <div wire:loading.grid>@include('backend.layouts.loading')</div>
  </ul>

  <div class="search">
    <input type="search" wire:model.debounce.1000ms='search' class="search-box" />
    <span class="search-button">
      <span class="search-icon"></span>
    </span>
  </div>
  
  <script type="text/javascript">
    window.onscroll = function (ev) {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            window.livewire.emit('load-more');
        }
    };
  </script>
</div>
