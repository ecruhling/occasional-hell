<header class="w-fixed w-half flex-shrink flex-grow-0 px-0 pb-5" id="header">
  <div class="sticky top-0 w-full h-full">
    <a class="brand block mb-4" href="{{ home_url('/') }}">
      <span class="text-black sr-only">{{ $siteName }}</span>
    </a>
    <nav class="nav-primary pl-5">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_id' => 'main-menu', 'menu_class' => 'nav text-white', 'echo' => false]) !!}
      @endif
    </nav>
  </div>
</header>
