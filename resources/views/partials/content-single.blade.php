<article @php(post_class())>
  <header>
    <h1 class="entry-title inline-block relative z-10 bg-gradient-to-r from-yellow-200 to-yellow-200 py-1 px-2">
      {!! $title !!}
    </h1>
    <time class="updated text-sm bg-gray-200 p-1 pl-2 z-0 -left-3 -bottom-3 text-normal relative tracking-wider" datetime="{{ get_post_time('c', true) }}">
      ({{ get_the_date() }})
    </time>
  </header>

  <div class="entry-content">
    @php(the_content())
  </div>

  <footer>
    <p class="byline author vcard inline-block bg-black text-white text-xs px-2 rounded-lg tracking-widest">
      <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn text-white">{{ get_the_author() }}</a>
      <span> {{ __('said.', 'sage') }}</span>
    </p>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
