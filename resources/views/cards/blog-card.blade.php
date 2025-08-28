@if ($post)

  @php
    $title = get_the_title($post->ID);
    $flex_rows = get_field('flex_rows', $post->ID);
    $content = '';
    if ($flex_rows && is_array($flex_rows)) {
        foreach ($flex_rows as $row) {
            if ($row['acf_fc_layout'] === 'content' && !empty($row['content'])) {
                $content = $row['content'];
                break;
            }
        }
    }
    $excerpt = wp_trim_words($content, 10);
    $categories = get_the_category($post->ID);
    $permalink = get_the_permalink($post->ID);
  @endphp

  <a href="{!! $permalink !!}" class="c-blog-block">
    <div class="c-blog-block__image">
      @php
        $image = [
          'id' => get_post_thumbnail_id($post->ID),
          'alt' => get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true),
          'url' => get_the_post_thumbnail_url($post->ID, 'large'),
          'width' => get_post_thumbnail_id($post->ID)->width ?? '',
          'height' => get_post_thumbnail_id($post->ID)->height ?? '',
        ];
      @endphp
      @include('macros.image', ['image' => $image])
    </div>
    <div class="c-blog-block__body text-dark">
      <h2 class="h3 mb-2">{!! $title !!}</h2>
      <p class="mb-2">{!! $excerpt !!}</p>
      <div class="btn btn-link">
          <span>{!! __('Lees verder', 'sage') !!}</span>
          @svg('arrow-right')
      </div>
    </div>
  </a>

@endif
