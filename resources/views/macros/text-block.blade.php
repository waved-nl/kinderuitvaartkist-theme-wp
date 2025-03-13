@if (!empty($content))
  @php
      $heading_type = $heading_class ?? 'h2';
      if(isset($content->heading_type) && !empty($content->heading_type)) {
          $heading_type = $content->heading_type;
      }
  @endphp
  <div class="o-content {{ $class ?? '' }}">
      @if ($content->title)
          <{{ $heading_type ?? 'h2'}} class="{{ $heading_class ?? 'h1' }}">{!! App\boldWordFormat($content->title) !!}</{{ $heading_type ?? 'h2'}}>
      @endif
      @if (isset($content->content))
          {!! $content->content !!}
      @endif
      @if(!empty($content->link))
          @include('macros.button', ['link' => $content->link, 'class' => $btn_class ?? 'btn-gold'])
      @endif
  </div>
@endif
