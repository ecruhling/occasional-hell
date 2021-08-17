<header class="w-fixed w-half flex-shrink flex-grow-0 px-4">
  <div class="sticky top-0 p-4 w-full h-full">
    <a class="brand" href="{{ home_url('/') }}">
      <span class="sr-only">{{ $siteName }}</span>
    </a>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
      @endif
    </nav>
  </div>
</header>
