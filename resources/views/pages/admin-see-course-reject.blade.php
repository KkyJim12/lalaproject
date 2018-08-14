@extends('templates.admin-templates')

@section('content')
<div class="container mt-3 mb-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>{{$course->course_name}}</h1><hr>
    </div>
    <div class="col-lg-12">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100 course-slide" src="/assets/img/slide/slide.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 course-slide" src="/assets/img/slide/slide2.jpg" alt="First slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>
<div class="container mb-5" style="background-color:white;">
  <div class="row course-layout border">
    <div class="col-lg-3">
      <div class="card" style="width: 100%;">
        <img class="card-img-top course-detail-img" src="/assets/img/profile/{{$mycourse->myuser->user_img}}" alt="user_img">
        <div class="card-body">
          <h5 class="card-title">เกี่ยวกับผู้สอน</h5>
          <p>ชื่อ: {{$course->course_teacher_name}}</p>
          <p>โรงเรียน:{{$course->course_teacher_school}}</p>
          <p>มหาลัย:{{$course->course_teacher_college}}</p>
          <p>ผลงาน: {{$course->course_teacher_awards}}</p>
          <p>ความสามารถพิเศษ: {{$course->course_teacher_skill}}</p>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <h3>{{$course->course_name}}</h3><hr>
      <h5>ราคา {{$course->course_price}} บาท</h5>
      <p>วันเรียน: {{$course->course_start_date}} - {{$course->course_end_date}}</p>
      <p>สมัครได้ถึง: {{$course->course_expire_date}}</p><hr>
      <h3>รายละเอียดอื่นๆ</h3>
      <p>{{$course->course_detail}}</p>
    </div>
    <div class="col-lg-3">
      <div class="border course-card">
        <h3>ข้อมูลติดต่อ</h3>
        <p><i class="fas fa-phone"></i> {{$course->course_phone}}</p>
        <p><i class="fab fa-line"></i> {{$course->course_line}}</p>
        <p><i class="fab fa-facebook-square"></i> {{$course->course_facebook}}</p>
        <p><i class="fab fa-internet-explorer"></i> <a href="{{$course->course_website}}">{{$course->course_website}}</a></p>
      </div>

      <div class="border mt-3 course-card">
        <h2>จำนวนคนเรียน</h2>
        <h1>1/{{$course->course_max}}</h1>
        <h6>{{$course->course_rank}}</h6>
        <p>
          <form action="/admin-approve-course/{{$course->course_id}}" method="post">
            <input type="hidden" name="course_id" value="{{$course->course_id}}">
            <input type="hidden" name="see" value="1">
            @csrf
            <button class="btn btn-success form-control" onclick="return confirm('คุณต้องการอนุมัติจริงไหม?')" type="submit">อนุมัติ</button>
          </form>
        </p>
        <p>
          <a href="/admin-edit-course/{{$course->course_id}}" class="btn btn-warning form-control">แก้ไข</a>
        </p>
        <p>
          <form action="/admin-delete-course/{{$course->course_id}}" method="post">
            <input type="hidden" name="course_id" value="{{$course->course_id}}">
            <input type="hidden" name="see" value="1">
            @csrf
            <button class="btn btn-danger form-control" onclick="return confirm('คุณต้องการลบจริงไหม?')" type="submit">ลบ</button>
          </form>
        </p>
        <p>
          <form action="/admin-ban-course/{{$course->course_id}}" method="post">
            <input type="hidden" name="course_id" value="{{$course->course_id}}">
            <input type="hidden" name="see" value="1">
            @csrf
            <button class="btn btn-danger form-control" onclick="return confirm('คุณต้องการแบนจริงไหม?')" type="submit">แบน</button>
          </form>
        </p>
      </div>

    </div>
  </div>
</div>
@endsection
