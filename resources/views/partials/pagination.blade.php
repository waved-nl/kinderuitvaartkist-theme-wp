@if (get_next_posts_link() || get_previous_posts_link())
  <nav class="c-pagination woocommerce-pagination" role="navigation" aria-label="{{ __('Posts navigation', 'sage') }}">
    <div class="c-pagination__container">
      @php
        global $wp_query;
        $big = 999999999;
        echo paginate_links([
          'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
          'format' => '?paged=%#%',
          'current' => max(1, get_query_var('paged')),
          'total' => $wp_query->max_num_pages,
          'prev_text' => __('←', 'sage'),
          'next_text' => __('→', 'sage'),
          'type' => 'list',
          'class' => 'page-numbers',
        ]);
      @endphp
    </div>
  </nav>
@endif
