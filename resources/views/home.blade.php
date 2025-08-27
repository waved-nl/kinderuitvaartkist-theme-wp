@extends('layouts.app')

@section('content')

  @include('partials.page-header')

  <section class="o-section o-section--archive bg-light-gold">
    <div class="container-fluid">
      @if (have_posts())
        <div class="row gy-5 gx-lg-5">
          @while(have_posts()) @php(the_post())
            <div class="col-12 col-md-6 col-lg-4">
              @include('cards.blog-card', ['post' => get_post()])
            </div>
          @endwhile
        </div>
        @include('partials.pagination')
      @else
        <div>
          <h2>{!! __('Geen blog berichten gevonden', 'sage') !!}</h2>
          <p>{!! __('Sorry, er zijn geen blog berichten gevonden.', 'sage') !!}</p>
        </div>
      @endif
    </div>
  </section>

  @include('partials.flex-rows')

@endsection
