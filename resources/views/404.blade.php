@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  @if (! have_posts())
    <x-alert type="warning">
      <h1 class="text-center text-white mb-3">404</h1>
      <p class="text-center my-0">This site has undergone a major overhaul, and the URL structures have changed.</p>
      <p class="text-center my-0">Below are some popular links, or alternatively you may Search for content.</p>
    </x-alert>
    {!! get_search_form(false) !!}
  @endif
@endsection
