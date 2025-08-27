@php
  $categories = get_the_category(get_the_ID());
  $related_posts = [];

  if ($categories) {
    $category_ids = wp_list_pluck($categories, 'term_id');

    $related_posts = get_posts([
      'category__in' => $category_ids,
      'post__not_in' => [get_the_ID()],
      'numberposts' => 3,
      'post_status' => 'publish',
    ]);
  }
@endphp

@if ($related_posts)
  <section class="o-section o-section--related-posts bg-light-gold">
    <div class="container-fluid-xl">
      <h2 class="text-h2">{{ __('Gerelateerde artikelen', 'sage') }}</h2>
      <div class="row gy-5 gx-lg-5">
        @foreach ($related_posts as $related_post)
          <div class="col-12 col-md-6 col-lg-4">
            @include('cards.blog-card', ['post' => $related_post])
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
