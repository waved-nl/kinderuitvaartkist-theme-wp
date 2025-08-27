<article class="c-single-post">

  <header class="c-post-header">
    <div class="c-post-header__background {{ !has_post_thumbnail() ? 'has-no-image' : ''}}">
      @if (has_post_thumbnail())
        @php
          $image = [
            'id' => get_post_thumbnail_id(get_the_ID()),
            'alt' => get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true),
            'url' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
            'width' => get_post_thumbnail_id(get_the_ID())->width ?? '',
            'height' => get_post_thumbnail_id(get_the_ID())->height ?? '',
          ];
        @endphp
        @include('macros.image', ['image' => $image])
      @endif
    </div>
    <div class="c-post-header__inner">
      <div class="container-fluid-xl">
        <div class="c-post-header__categories">
          @php
            $categories = get_the_category(get_the_ID());
          @endphp
          @foreach ($categories as $category)
            <div class="c-post-header__category">{!! $category->name !!}</div>
          @endforeach
        </div>
        <h1 class="c-post-header__title h1">{!! App\boldWordFormat(get_the_title()) !!}</h1>
        <time class="c-post-header__date" datetime="{{ get_the_date('c', get_the_ID()) }}">
          {{ get_the_date('', get_the_ID()) }}
        </time>
      </div>
    </div>
  </header>

  <section class="o-section o-section--post-content">
    <div class="container-fluid-xl">
      <div class="o-content">
        {!! the_content() !!}
      </div>
    </div>
  </section>

</article>

@include('partials.related-posts')

