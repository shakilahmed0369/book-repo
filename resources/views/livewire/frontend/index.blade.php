<div>
  <ul>
    @foreach ($books as $book)
    <li><img src="{{ $book->book_cover ? asset($book->book_cover) : 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/881020/book10.jpg' }}" alt=""></li>
    @endforeach
    <div wire:loading.grid>@include('backend.layouts.loading')</div>
  </ul>


  
  <script type="text/javascript">
    window.onscroll = function (ev) {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            window.livewire.emit('load-more');
        }
    };
  </script>
</div>
