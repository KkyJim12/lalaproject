<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/dropzone.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/js/custom.js" type="text/javascript"></script>
    <script src="assets/js/dropzone.js"></script>
    <script src="https://cdn.omise.co/card.js" type="text/javascript"></script>
  </head>
  <body class="body-course">
    @include('components.navbar')
    @include('components.menu')
    <div class="container mt-3 mb-5">
      <div class="row">
        <div class="col-lg-12">
          <h1>{{$course->course_name}}</h1><hr>
        </div>
        <div class="col-lg-12" style="background-color:black;">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block course-slide" src="/assets/img/course/{{$course->course_img}}" alt="slide">
              </div>
              @foreach($courseloop as $courses)
              <div class="carousel-item">
                <img class="d-block course-slide" src="/assets/img/courseimg/{{$courses->course_other_img_img}}" alt="slide">
              </div>
              @endforeach
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
        @if ($errors->any())
        <div class="col-lg-12">
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        </div>
        @endif
        @if(session('error'))
          <div class="col-lg-12">
            <div class="alert alert-danger">
              <ul>
                <li>{{session('error')}}</li>
              </ul>
            </div>
          </div>
        @endif
        @if(session('success'))
          <div class="col-lg-12">
            <div class="alert alert-success">
              <ul>
                <li>{{session('success')}}</li>
              </ul>
            </div>
          </div>
        @endif
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
          <p>สถานที่เรียน: {{$course->course_place}}</p>
          <p>วันเรียน: {{date('d/m/Y', strtotime($course->course_start_date))}} - {{date('d/m/Y', strtotime($course->course_end_date))}}</p>
          <p>สมัครได้ถึง: {{date('d/m/Y', strtotime($course->course_expire_date))}}</p><hr>
          <h3>รายละเอียดอื่นๆ</h3>
          <p>{{$course->course_detail}}</p>
        </div>
        <div class="col-lg-3">
          <div class="border course-card">
            <h3>ข้อมูลติดต่อ</h3>
            <p><i class="fas fa-phone"></i> {{$course->course_phone}}</p>
            <p><i class="fab fa-line"></i> {{$course->course_line}}</p>
            <p><i class="fab fa-facebook-square"></i> <a href="{{$course->course_facebook}}">{{$mycourse->myuser->user_fname}} {{$mycourse->myuser->user_lname}}</a> </p>
            <p><i class="fab fa-internet-explorer"></i> <a href="{{$course->course_website}}">{{$course->course_website}}</a></p>
          </div>

          <div class="border mt-3 course-card">
            <h2>จำนวนคนเรียน</h2>
            <h1>{{$num_course}}/{{$course->course_max}}</h1>
            <h6>{{$course->course_rank}}</h6><hr>
            @if(session('user_log') == null)
            <a href="/login"><button class="btn btn-success form-control">ล๊อกอินเพื่อสมัครเรียน</button></a>
            @elseif($course->course_approve == null)
              <button class="btn btn-danger form-control" disabled>คอร์สยังไม่ได้รับการอนุมัติ</button>
            @elseif($mytime > $course->course_expire_date)
              <button class="btn btn-danger form-control" disabled>หมดเขตรับสมัครแล้ว</button>
            @elseif($already_join)
              <button class="btn btn-danger form-control" disabled>คุณสมัครคอร์สนี้แล้ว</button>
            @elseif($course->course_max == $course->course_now_joining)
              <button class="btn btn-danger form-control" disabled>คอร์สเต็มแล้ว</button>
            @elseif($course_transfer)
            <div class="form-group">
              <h5>฿{{($course->course_price)*0.1}} (มัดจำ 10%)</h5>
              <label for="upload_slip">อัพโหลดหลักฐาน</label>
              <form class="" action="/upload-slip" method="post" enctype="multipart/form-data">
                <input type="hidden" name="course_id" value="{{$course->course_id}}">
                <input type="hidden" name="course_name" value="{{$course->course_name}}">
                <input type="hidden" name="course_price" value="{{$course->course_price}}">
                <input id="upload_slip" class="" type="file" name="course_transfer" placeholder="upload หลักฐาน">
                @csrf
                <button class="btn btn-success form-control mt-3" type="submit">อัพโหลด</button>
              </form>
            </div>
            <form action="/change-transfer-method/{{$course->course_id}}" method="post">
              <input type="hidden" name="course_id" value="{{$course->course_id}}">
              @csrf
              <button class="btn btn-danger form-control" type="submit" name="button">ยกเลิก</button>
            </form>
            @elseif($transfer_upload)
            <form action="/change-transfer-method/{{$course->course_id}}" method="post">
              <label for="upload_cancle">กำลังตรวจสอบ...</label>
              <input type="hidden" id="upload_cancle" name="course_id" value="{{$course->course_id}}">
              @csrf
              <button class="btn btn-danger form-control" type="submit" name="button">ยกเลิก</button>
            </form>
            @else
            <h5>฿{{($course->course_price)*0.1}} (มัดจำ 10%)</h5>
            <form class="" action="/transfer-study-process/{{$course->course_id}}" method="post">
              <input type="hidden" name="course_id" value="{{$course->course_id}}">
              @csrf
              <button class="btn btn-success form-control" type="submit" name="button">โอนเงิน</button>
            </form>

            <form class="checkout-form mt-2" name="checkoutForm" method="POST" action="/omise-checkout">
              @csrf
              <input type="hidden" name="course_description" value="{{$course->course_name}}" />
              <input type="hidden" name="course_price" value="{{($course->course_price.'00')*0.1}}">
              <input type="hidden" name="course_id" value="{{$course->course_id}}">
              <script type="text/javascript" src="https://cdn.omise.co/card.js"
                data-key="pkey_test_5cxodoewdmtrmj4j1g4"
                data-image="PATH_TO_LOGO_IMAGE"
                data-frame-label="www.Bestskill.co"
                data-button-label="จ่ายบัตรเครดิต/เดบิต"
                data-submit-label="ยืนยันการชำระเงิน"
                data-amount= "{{($course->course_price.'00')*0.1}}"
                data-currency="thb"
                >
              </script>
          <!--the script will render <input type="hidden" name="omiseToken"> for you automatically-->
            </form>
            @endif
          </div>
        </div>
      </div>
    </div>
    @include('components.footer')
  </body>
</html>
