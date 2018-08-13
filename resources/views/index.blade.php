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

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>คอร์สยอดนิยม</h1><hr>
    </div>
    @foreach($suggest_course as $suggest_courses)
    <div class="col-lg-3">
      <div class="card" style="width:80%;">
        <img class="card-img-top course-img" src="/assets/img/course/{{$suggest_courses->course_img}}" alt="course_img">
        <div class="card-body">
          <h5 class="card-title">{{$suggest_courses->course_name}}</h5>
          <p class="card-text">ราคา: {{$suggest_courses->course_price}}</p>
          <p class="card-text">คะแนน: {{$suggest_courses->course_rank}}</p>
          <p class="card-text">จำนวนคนเรียน: {{$suggest_courses->course_max}}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>คอร์สแนะนำ</h1><hr>
    </div>
    @foreach($suggest_course as $suggest_courses)
    <div class="col-lg-3">
      <div class="card" style="width:80%;">
        <img class="card-img-top course-img" src="/assets/img/course/{{$suggest_courses->course_img}}" alt="course_img">
        <div class="card-body">
          <h5 class="card-title">{{$suggest_courses->course_name}}</h5>
          <p class="card-text">ราคา: {{$suggest_courses->course_price}}</p>
          <p class="card-text">คะแนน: {{$suggest_courses->course_rank}}</p>
          <p class="card-text">จำนวนคนเรียน: {{$suggest_courses->course_max}}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>หมวดหมู่งานยอดนิยม</h1><hr>
    </div>
    @foreach($show_category as $categorys)
    <div class="col-lg-2">
      <figure class="figure">
        <img src="/assets/img/category/{{$categorys->category_img}}" class="figure-img img-fluid rounded category-suggest-img" alt="category_img">
        <figcaption class="figure-caption">{{$categorys->category_name}}</figcaption>
      </figure>
    </div>
    @endforeach
  </div>
</div>
@endif
@endsection
