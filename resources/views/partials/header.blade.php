<header class="w-fixed w-half flex-shrink flex-grow-0 px-4 pb-5">
  <div class="sticky top-0 w-full h-full">
    <a class="brand block mt-2 mb-4" href="{{ home_url('/') }}">
      <span class="text-black">{{ $siteName }}</span>
    </a>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
      @endif
    </nav>
  </div>
</header>
