@extends('templates.admin-templates')

@section('content')
<div class="admin-category-show-box">
  <div class="justify-content-center">
    <div class="col-lg-12">
      <a class="btn btn-success form-control mt-3" href="/admin-create-slide">สร้างสไลด์</a>
      <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Slide Image</th>
            <th scope="col">Slide Name</th>
            <th scope="col">Slide Number</th>
            <th scope="col">Slide Link</th>
            <th scope="col">แก้ไข</th>
            <th scope="col">ลบ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($show_slide as $show_slides)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td><img class="admin-category-img" src="/assets/img/slide/{{$show_slides->slide_img}}" alt="slide_img"></td>
            <td>{{$show_slides->slide_name}}</td>
            <td>{{$show_slides->slide_number}}</td>
            <td>{{$show_slides->slide_link}}</td>
            <td>
              <a href="/admin-edit-slide/{{$show_slides->slide_id}}" class="btn btn-warning form-control" href="#">แก้ไข</a>
            </td>
            <td>
              <form action="/admin-delete-slide/{{$show_slides->slide_id}}" method="post">
                <input type="hidden" name="slide_id" value="{{$show_slides->slide_id}}">
                @csrf
                <button class="btn btn-danger form-control" onclick="return confirm('คุณต้องการลบจริงไหม?')" type="submit">ลบ</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
