<article @php(post_class())>
  <header>
    <h1 class="entry-title inline-block relative z-10 bg-gradient-to-r from-yellow-200 to-yellow-200 py-1 px-2">
      {!! $title !!}
    </h1>
    @include('partials.date-posted')
  </header>
  <div class="entry-content">
    @php(the_content())
  </div>
  <footer>
    @include('partials.author')
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php(comments_template())
</article>
