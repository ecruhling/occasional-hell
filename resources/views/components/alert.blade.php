<div {{ $attributes->merge(['class' => $type]) }}>
  <div class="p-5">
    {!! $message ?? $slot !!}
  </div>
</div>
