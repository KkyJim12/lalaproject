@extends('templates.admin-templates')

@section('content')
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
            <th scope="col">แนะนำ</th>
            <th scope="col">Reject</th>
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
              @if($courses->course_suggest == 1)
              <td><p><i class="fas fa-check"></i></p></td>
              @else
              <td><p><i class="fas fa-times"></i></p></td>
              @endif
              <td>
                <button type="button" class="btn btn-danger form-control" data-toggle="modal" data-target="#rejectmodal">
                  ไม่อนุมัติ
                </button>
                <!--modal-->
                <div class="modal fade" id="rejectmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ใส่เหตุผลที่ไม่อนุมัติ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="/admin-reject-course-process/{{$courses->course_id}}" method="post">
                          <textarea class="form-control" name="course_reject" rows="5" cols="80" placeholder="กรุณากรอกเหตุผล"></textarea>
                          <input type="hidden" name="course_id" value="{{$courses->course_id}}">
                          @csrf
                          <button class="btn btn-danger form-control mt-3" type="submit">ปฏิเสธ</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--end modal-->
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
              <a href="/admin-see-course-approve/{{$courses->course_id}}" class="btn btn-primary form-control">ดูข้อมูลเพิ่ม</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
