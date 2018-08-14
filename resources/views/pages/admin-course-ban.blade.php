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
            <th scope="col">Approve</th>
            <th scope="col">Sell</th>
            <th scope="col">ลบ</th>
            <th scope="col">แก้แบน</th>
            <th scope="col">ข้อมูลเพิ่มเติม</th>
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
            <td></td>
            <td>
              <form action="/admin-forcedelete-course/{{$courses->course_id}}" method="post">
                <input type="hidden" name="course_id" value="{{$courses->course_id}}">
                @csrf
                <button class="btn btn-danger form-control" onclick="return confirm('คุณต้องการลบจริงไหม?')" type="submit">ลบ</button>
              </form>
            </td>
            <td>
              <form action="/admin-restore-ban-course/{{$courses->course_id}}" method="post">
                <input type="hidden" name="course_id" value="{{$courses->course_id}}">
                @csrf
                <button class="btn btn-warning form-control" onclick="return confirm('คุณต้องการแก้แบนจริงไหม?')" type="submit">แก้แบน</button>
              </form>
            </td>
            <td>
              <a href="/admin-see-ban-course/{{$courses->course_id}}" class="btn btn-primary form-control">ดูข้อมูลเพิ่ม</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
