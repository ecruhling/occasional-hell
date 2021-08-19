<div class="w-full flex flex-col sm:flex-row flex-wrap sm:flex-nowrap py-4 flex-grow h-full">

  <a class="sr-only focus:not-sr-only" href="#main">
    {{ __('skip to content') }}
  </a>

  @include('partials.header')

  <main id="main" class="w-full flex-grow pt-1 px-3 prose sm:prose-sm lg:prose-lg xl:prose-xl 2xl:prose-2xl max-w-none relative">
    @yield('content')
    @include('partials.notice')
  </main>

  @hasSection('sidebar')
    <aside class="sidebar w-fixed w-half flex-shrink flex-grow-0 px-2">
      <div class="flex sm:flex-col px-2 prose">
        @yield('sidebar')
      </div>
    </aside>
  @endif

</div>
@include('partials.footer')
