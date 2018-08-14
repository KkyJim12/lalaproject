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
            <th scope="col">Reject Reason</th>
            <td scope="col">อนุมัติ</td>
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
            <td>{{$courses->course_reject}}</td>
            <td>
              <form action="/admin-approve-course/{{$courses->course_id}}" method="post">
                <input type="hidden" name="course_id" value="{{$courses->course_id}}">
                @csrf
                <button class="btn btn-success form-control" onclick="return confirm('คุณต้องการอนุมัติจริงไหม?')" type="submit">อนุมัติ</button>
              </form>
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
              <a href="/admin-see-course-reject/{{$courses->course_id}}" class="btn btn-primary form-control">ดูข้อมูลเพิ่ม</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
