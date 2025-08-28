@php
    $content = (object) $row->row_content;
@endphp

<section class="o-section o-section--teasers {{ is_singular('post') ? '' : 'bg-light-gold' }}">
  <div class="{{ is_singular('post') ? 'container-fluid-lg' : 'container-fluid' }}">
    <div class="c-teaser-blocks">
      <div class="row gy-5 gx-lg-5">
        @foreach ($content->teasers as $teaser)
          <div class="col-md-4">
            @include('cards.teaser-card', [
              'data' => (object) $teaser
            ])
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
