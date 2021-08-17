<article @php(post_class())>
  <header>
    <h2 class="entry-title inline-block relative z-10">
      <a class="bg-gradient-to-r from-yellow-200 to-yellow-200 py-1 px-2" href="{{ get_permalink() }}">
        {!! $title !!}
      </a>
    </h2>
    <time class="updated text-sm bg-gray-200 p-1 pl-2 z-0 -left-3 -bottom-2 text-normal relative tracking-wider" datetime="{{ get_post_time('c', true) }}">
      ({{ get_the_date() }})
    </time>
  </header>

  <div class="entry-summary">
    @php(the_excerpt())
  </div>
  <footer>
    <p class="byline author vcard inline-block bg-black text-white text-xs px-2 rounded-lg tracking-widest">
      <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn text-white">{{ get_the_author() }}</a>
      <span> {{ __('said.', 'sage') }}</span>
    </p>
  </footer>
</article>
