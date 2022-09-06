@extends('frontend.f-layout.app')
@section('main-section')
<section id="home">
    <!-- Home Slider-->
    <div id="home-slider" class="flexslider">
      <ul class="slides">
        @forelse ($slider as $item)
        <li>
          <img src="{{ url('storage/sliders/', $item -> photo) }}" alt="">
          <div class="slide-wrap">
            <div class="slide-content">
              <div class="container">
                <h1>{{ $item -> title }}<span class="red-dot"></span></h1>
                <h6>{{ $item -> subtitle }}</h6>
                <p>
                @foreach (json_decode($item -> btn) as $btns)
                <a href="{{ $btns -> btn_link }}" class="{{ $btns -> btn_type }}">{{ $btns -> btn_title }}</a>
                
                @endforeach
              </p>
              </div>
            </div>
          </div>
        </li>
        @empty
          <h2>Error</h2>
          
        @endforelse
        
      </ul>
    </div>
    <!-- End Home Slider-->
  </section>

  @include('frontend.section.who')
  @include('frontend.section.expertise')
  @include('frontend.section.vision')
  @include('frontend.section.selected')
  @include('frontend.section.our')
  @include('frontend.section.parallax')
  @include('frontend.section.theblog')
  
@endsection