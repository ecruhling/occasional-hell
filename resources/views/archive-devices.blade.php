@extends('layouts.app')

@section('content')
  <div class="page-header">
    <h1 class="mb-2">Infernal Device</h1>
    <h2 class="mt-0">Machinery of Torture and Execution</h2>
  </div>

  @if (! have_posts())
    <x-alert type="warning text-center p-4">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  @while(have_posts()) @php(the_post())
  @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
  @endwhile

  <img src="{{ \Roots\asset('images/idheader.jpg')->__toString() }}" alt="infernal device"/>

  {!! get_the_posts_navigation() !!}
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection
