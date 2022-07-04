<form role="search" method="get" class="search-form text-center py-5" action="{{ home_url('/') }}">
  <label>
    <span class="sr-only">
      {{ _x('Search for:', 'label', 'sage') }}
    </span>
    <input
      type="search"
      class="px-3 py-1 border h-11"
      placeholder="{!! esc_attr_x('Search &hellip;', 'placeholder', 'sage') !!}"
      value="{{ get_search_query() }}"
      name="s"
    >
  </label>
  <button
    class="px-3 py-1 text-white bg-black cursor-pointer"
  >{{ _x('Search', 'submit button', 'sage') }}</button>
</form>
