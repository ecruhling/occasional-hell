@extends('layouts.app')

@section('content')
  @if (is_home())
    @include('partials.page-header-sr-only')
  @else
    @include('partials.page-header')
  @endif

  @if (! have_posts())
    <x-alert type="warning text-center p-4">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  @while(have_posts()) @php(the_post())
  @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection
