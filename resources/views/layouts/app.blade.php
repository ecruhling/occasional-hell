<div class="w-full flex flex-col sm:flex-row flex-wrap sm:flex-nowrap flex-grow h-full" style="min-height: 95vh;">

  <a class="sr-only focus:not-sr-only" href="#main">
    {{ __('skip to content') }}
  </a>

  @include('sections.header')

  <main id="main" class="main w-full flex-grow pt-4 pb-5 pl-6 pr-4 prose sm:prose-sm lg:prose-lg xl:prose-xl 2xl:prose-2xl max-w-none relative">
    @yield('content')
  </main>

  @hasSection('sidebar')
    <aside class="sidebar w-fixed w-half flex-shrink flex-grow-0 px-2">
      <div class="flex sm:flex-col px-2 prose">
        @yield('sidebar')
      </div>
    </aside>
  @endif

</div>

@include('sections.footer')
