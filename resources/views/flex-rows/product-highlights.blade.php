@php
  $content = (object) $row->row_content;
@endphp

@if (isset($content->product_ids) && !empty($content->product_ids))
  <section class="o-section o-section--product-highlights">
    <div class="{{ is_singular('post') ? 'container-fluid-lg' : 'container-fluid' }}">
      <div class="d-flex flex-column">
        <div class="row order-md-2">
          <div class="{{ is_singular('post') ? 'col-md-12' : 'col-md-3' }}">
            @if (is_singular('post'))
              <div class="row mb-4">
                @if (isset($content->title) && !empty($content->title))
                  <div class="col-7">
                    <{{ $content->heading_type ?? 'h2'}} class="h1 mb-0">{!! App\boldWordFormat($content->title) !!}</{{ $content->heading_type ?? 'h2'}}>
                  </div>
                @endif
                <div class="col-5 d-flex justify-content-end align-items-end">
                  <div class="c-product-related-slider-nav mt-0 mb-0">
                    @php
                        $link = (object) $content->assortment_link;
                    @endphp
                    @if(!empty($link) && isset($link->url) && !empty($link->url))
                      <a href="{!! $link->url !!}" target="{{ !empty($link->target) ? $link->target : '_self' }}" class="c-product-related-slider-nav__link">
                        {!! $link->title !!}
                      </a>
                    @endif
                    <button type="button" class="c-product-related-slider-nav__arrow c-product-related-slider-nav__arrow--left {{ count($content->product_ids) <= 3 ? 'd-lg-none' : '' }}" data-product-product-highlights-prev>
                      @svg('arrow-right')
                    </button>
                    <button type="button" class="c-product-related-slider-nav__arrow c-product-related-slider-nav__arrow--right {{ count($content->product_ids) <= 3 ? 'd-lg-none' : '' }}" data-product-product-highlights-next>
                      @svg('arrow-right')
                    </button>
                  </div>
                </div>
              </div>
            @else
              @if (isset($content->title) && !empty($content->title))
                <{{ $content->heading_type ?? 'h2'}} class="h1">{!! App\boldWordFormat($content->title) !!}</{{ $content->heading_type ?? 'h2'}}>
              @endif
            @endif
          </div>
          <div class="{{ is_singular('post') ? 'col-md-12' : 'col-md-9' }}">
            <div class="c-product-related-slider swiper-container swiper" data-product-product-highlights-slider>
              <div class="c-product-related-slider__wrapper swiper-wrapper">
                @foreach ($content->product_ids as $product_id)
                  <div class="c-product-related-slider__slide swiper-slide">
                    @php
                      $post_object = get_post( $product_id );
                      setup_postdata( $GLOBALS['post'] =& $post_object );
                      wc_get_template_part( 'content', 'product' );
                    @endphp
                  </div>
                @endforeach
                @php
                  wp_reset_postdata();
                @endphp
              </div>
            </div>
          </div>
        </div>
        @if (!is_singular('post'))
          <div class="row order-md-1">
            <div class="offset-md-3 col-md-9">
              <div class="c-product-related-slider-nav">
                @php
                    $link = (object) $content->assortment_link;
                @endphp
                @if(!empty($link) && isset($link->url) && !empty($link->url))
                  <a href="{!! $link->url !!}" target="{{ !empty($link->target) ? $link->target : '_self' }}" class="c-product-related-slider-nav__link">
                    {!! $link->title !!}
                  </a>
                @endif
                <button type="button" class="c-product-related-slider-nav__arrow c-product-related-slider-nav__arrow--left {{ count($content->product_ids) <= 3 ? 'd-lg-none' : '' }}" data-product-product-highlights-prev>
                  @svg('arrow-right')
                </button>
                <button type="button" class="c-product-related-slider-nav__arrow c-product-related-slider-nav__arrow--right {{ count($content->product_ids) <= 3 ? 'd-lg-none' : '' }}" data-product-product-highlights-next>
                  @svg('arrow-right')
                </button>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </section>
@endif
