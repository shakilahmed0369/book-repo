@extends('frontend.layouts.master')

@section('content')

  {{-- Adding livewire component  --}}
  @livewire('frontend.index')
  {{-- Footer aria --}}

  @include('frontend.layouts.footer')
@endsection
