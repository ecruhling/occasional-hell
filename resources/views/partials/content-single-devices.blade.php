<article @php(post_class())>
  <header>
    <h1 class="entry-title inline-block relative z-10 bg-gradient-to-r from-yellow-200 to-yellow-200 py-1 px-2">
      {!! $title !!}
    </h1>
  </header>
  <div class="entry-content grid gap-4 md:grid-cols-2">
    <div>
      <x-content field="content_left"></x-content>
    </div>
    <div class="text-center">
      <x-image field="image_01" classes="mx-auto"></x-image>
    </div>
    <div class="md:order-2">
      <h2>Trivia & Comment</h2>
      <x-content field="trivia_comment"></x-content>
    </div>
    <div class="md:order-1 text-center">
      <x-image field="image_02" classes="mx-auto"></x-image>
    </div>
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
