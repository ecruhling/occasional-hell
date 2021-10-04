<article @php(post_class('pr-5 relative pt-5 mb-12'))>
  <header class="pt-5">
    <h2 class="entry-title inline relative z-10 bg-gradient-to-r from-yellow-200 to-yellow-200 py-1 px-2 mb-0">
      <a class="" href="{{ get_permalink() }}">
        {!! $title !!}
      </a>
    </h2>
    @include('partials.date-posted')
  </header>
  <div class="entry-summary">
    @php(the_excerpt())
  </div>
  <footer>
    @include('partials.author')
  </footer>
</article>
