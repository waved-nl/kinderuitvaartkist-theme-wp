@php
    $content = (object) $row->row_content;
@endphp

<section class="o-section o-section--referral {{ is_singular('post') ? '' : 'bg-light-green' }}">
  <div class="{{ is_singular('post') ? 'container-fluid-lg' : 'container-fluid' }}">
    <div class="row gy-4 gx-5">
      <div class="col-md-4 col-lg-3">
        @if (!empty($content->image))
          @include('macros.image', [
            'image' => $content->image,
            'class' => 'o-image'
          ])
        @endif
      </div>
      <div class="col-md-8 col-lg-9">
        @include('macros.text-block', [
          'content' => $content,
          'class' => 'u-text-large',
          'btn_class' => 'btn-black'
        ])
      </div>
    </div>
  </div>
</section>
