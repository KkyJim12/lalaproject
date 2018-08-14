<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/dropzone.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/js/custom.js" type="text/javascript"></script>
    <script src="/assets/js/dropzone.min.js"></script>
  </head>
  <body style="background-color:gray;">
    @include('components.navbar')
    <div class="mt-5">
      <div class="row">
        <div class="col-lg-2">
          <div class="col-lg-12">
            <a class="btn btn-info form-control" href="/admin">Admin Dashboard</a>
          </div>
          <div class="col-lg-12">
            <a class="btn btn-info form-control" href="/admin-category">Category</a>
          </div>
          <div class="col-lg-12">
            <a class="btn btn-info form-control" href="/admin-slide">Slide</a>
          </div>
          <div class="col-lg-12">
            <a class="btn btn-danger form-control" href="/admin-course">Course (active = สีแดง)</a>
          </div>
          <div class="col-lg-12">
            <a class="btn btn-info form-control" href="/admin-course-ban">Course Ban</a>
          </div>
          <div class="col-lg-12">
            <a class="btn btn-info form-control" href="/admin-course-approve">Course Approve</a>
          </div>
          <div class="col-lg-12">
            <a class="btn btn-info form-control" href="/admin-course-not-approve">Course Not Approve</a>
          </div>
          <div class="col-lg-12">
            <a class="btn btn-info form-control" href="/admin-course-reject">Course Reject</a>
          </div>
        </div>
        <div class="col-lg-10">
          <div class="admin-category-show-box">
            <div class="justify-content-center">
              <div class="col-lg-12">
                <table class="table table-striped mt-3">
                  <thead>
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Image</th>
                      <th scope="col">Name</th>
                      <th scope="col">Category</th>
                      <th scope="col">number</th>
                      <th scope="col">Approve</th>
                      <th scope="col">Sell</th>
                      <th scope="col">แนะนำ</th>
                      <th scope="col">แก้ไข</th>
                      <th scope="col">ลบ</th>
                      <th scope="col">แบน</th>
                      <th scope="col">ดูข้อมูลเต็ม</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($course as $courses)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td><img class="admin-category-img" src="/assets/img/course/{{$courses->course_img}}" alt="cpirse_img"> </td>
                      <td>{{$courses->course_name}}</td>
                      <td>{{$courses->course_category->category_name}}</td>
                      <td>{{$courses->course_max}}</td>
                        @if($courses->course_approve == 1)
                        <td><p><i class="fas fa-check"></i></p></td>
                        @else
                        <td><p><i class="fas fa-times"></i></p></td>
                        @endif
                      <td>
                        @if($courses->course_suggest == 1)
                        <td><p><i class="fas fa-check"></i></p></td>
                        @else
                        <td><p><i class="fas fa-times"></i></p></td>
                        @endif
                      </td>
                      <td>
                        <a href="/admin-edit-course/{{$courses->course_id}}" class="btn btn-warning form-control">แก้ไข</a>
                      </td>
                      <td>
                        <form action="/admin-delete-course/{{$courses->course_id}}" method="post">
                          <input type="hidden" name="course_id" value="{{$courses->course_id}}">
                          @csrf
                          <button class="btn btn-danger form-control" onclick="return confirm('คุณต้องการลบจริงไหม?')" type="submit">ลบ</button>
                        </form>
                      </td>
                      <td>
                        <form action="/admin-ban-course/{{$courses->course_id}}" method="post">
                          <input type="hidden" name="course_id" value="{{$courses->course_id}}">
                          @csrf
                          <button class="btn btn-danger form-control" onclick="return confirm('คุณต้องการแบนจริงไหม?')" type="submit">แบน</button>
                        </form>
                      </td>
                      <td>
                        <a href="/admin-see-course/{{$courses->course_id}}" class="btn btn-primary form-control">ดูข้อมูลเพิ่ม</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
