<article @php(post_class())>
  <header>
    <h2 class="entry-title inline-block relative z-10 bg-gradient-to-r from-yellow-200 to-yellow-200 py-1 px-2">
      <a class="" href="{{ get_permalink() }}">
        {!! $title !!}
      </a>
    </h2>
    @include('partials.date-posted')
  </header>
  <div class="entry-summary">
    @php(the_excerpt())
  </div>
</article>
