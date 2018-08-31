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

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>คอร์สยอดนิยม</h1><hr>
    </div>
    @if($popular_course->count() == 0)
      <div class="col-lg-12 mt-5 mb-5">
        <h2 style="text-align:center;">ยังไม่มีคอร์สยอดนิยม</h2>
      </div>
    @else
          <div class="owl-carousel owl-theme">
            @foreach($popular_course as $popular_courses)
            <div class="item">
              <div class="row">
                <div class="col-lg-12 mt-5" style="text-align:center;">
                    <a class="course-link" href="/see-course/{{$popular_courses->course_id}}" style="text-align:left;">
                      <div class="card hvr-grow-shadow" style="width:90%;">
                        <img class="card-img-top course-img" src="/assets/img/course/{{$popular_courses->course_img}}" alt="course_img">
                        <div class="card-body">
                          <h4 class="card-title course-title">{{str_limit($popular_courses->course_name,38)}}</h4><hr>
                          <h2 class="card-text">
                            <p>{{$popular_courses->course_teacher_name}}</p>
                            <span class="badge badge-primary">฿ {{$popular_courses->course_price}}</span>
                            <span class="badge badge-info" style="float:right;margin-top:5px;">
                              {{$popular_courses->course_now_joining}}/{{$popular_courses->course_max}}
                            </span>
                          </h2>
                          <small class="text-muted">เริ่มเรียน {{date('d/m/Y', strtotime($popular_courses->course_start_date))}} ถึง {{date('d/m/Y', strtotime($popular_courses->course_end_date))}}</small>
                        </div>
                      </div>
                    </a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
    @endif
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>คอร์สแนะนำ</h1><hr>
    </div>
    @if($suggest_course->count() == 0)
    <div class="col-lg-12 mt-5 mb-5">
      <h2 style="text-align:center;">ยังไม่มีคอร์สแนะนำ</h2>
    </div>
    @else
    <div class="owl-carousel owl-theme">
    @foreach($suggest_course as $suggest_courses)
    <div class="item">
      <div class="row">
      <div class="col-lg-12 mt-5" style="text-align:center;">
        <a class="course-link" href="/see-course/{{$suggest_courses->course_id}}" style="text-align:left;">
      <div class="card hvr-grow-shadow" style="width:90%;">
        <img class="card-img-top course-img" src="/assets/img/course/{{$suggest_courses->course_img}}" alt="course_img">
        <div class="card-body">
          <h4 class="card-title course-title">{{str_limit($suggest_courses->course_name,38)}}</h4><hr>
          <h2 class="card-text">
            <p>{{$suggest_courses->course_teacher_name}}</p>
              <span class="badge badge-primary">฿ {{$suggest_courses->course_price}}</span>
              <span class="badge badge-info" style="float:right; margin-top:5px;">
                {{$suggest_courses->course_now_joining}}/{{$suggest_courses->course_max}}
              </span>
          </h2>
          <small class="text-muted">เริ่มเรียน {{date('d/m/Y', strtotime($suggest_courses->course_start_date))}} ถึง {{date('d/m/Y', strtotime($suggest_courses->course_end_date))}}</small>
        </div>
      </div>
      </a>
      </div>
    </div>
  </div>
    @endforeach
  </div>
    @endif
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>หมวดหมู่งานยอดนิยม</h1><hr>
    </div>
    @if($suggest_category->count() == 0)
    <div class="col-lg-12 mt-5 mb-5">
      <h2 style="text-align:center;">ยังไม่มีหมวดหมู่แนะนำ</h2>
    </div>
    @else
    @foreach($suggest_category as $categorys)
      <div class="col-lg-3">
        <a href="/category/{{$categorys->category_id}}">
        <figure class="figure hvr-underline-reveal">
          <img src="/assets/img/category/{{$categorys->category_img}}" class="figure-img img-fluid rounded category-suggest-img" alt="category_img">
          <figcaption class="figure-caption">{{$categorys->category_name}}</figcaption>
        </figure>
        </a>
      </div>
    @endforeach
    @endif
  </div>
</div>

@endsection
