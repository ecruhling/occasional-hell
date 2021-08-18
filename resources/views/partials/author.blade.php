<p class="byline author vcard inline-block bg-black text-white text-xs px-2 rounded-lg tracking-widest">
  <span> {{ __('posted by ', 'sage') }}</span><a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn text-white">{{ get_the_author() }}</a>
</p>
