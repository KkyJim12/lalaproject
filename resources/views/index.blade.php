@extends('templates.master')

@section('content')
@if($firstslide !== null)
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    @if($otherslide)
    @foreach($otherslide as $otherslides)
    <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->iteration}}"></li>
    @endforeach
    @endif
  </ol>
  <div class="carousel-inner slide">
    <div class="carousel-item active">
    <a href="{{$firstslide->slide_link}}" target="_blank">
      <img class="d-block w-100" src="/assets/img/slide/{{$firstslide->slide_img}}" alt="slide_img">
    </a>
    </div>
    @if($otherslide)
    @foreach($otherslide as $otherslides)
    <div class="carousel-item">
    <a href="{{$otherslides->slide_link}}" target="_blank">
      <img class="d-block w-100" src="/assets/img/slide/{{$otherslides->slide_img}}" alt="slide_img">
    </a>
    </div>
    @endforeach
    @endif
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endif
@endsection
