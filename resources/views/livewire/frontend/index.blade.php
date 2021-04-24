<div>
  <ul class="text-center">
    @forelse ($books as $book)
      <li><a href="{{ route('pdf.view', $book->pdf) }}"><img src="{{ $book->book_cover ? asset($book->book_cover) : 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/881020/book10.jpg' }}" alt=""></a></li>
    @empty
      <div class="text-center text-light">No Books found :(</div>
    @endforelse
    <div wire:loading.grid>@include('backend.layouts.loading')</div>
  </ul>

  <div class="search">
    <input type="search" wire:model.defer='search' class="search-box" />

    <span class="search-button" style="z-index: 1" onclick="$(this).css('z-index', '-1')">
      <span class="search-icon"></span>
    </span>

    <span  wire:click='search' class="search-button two">
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
