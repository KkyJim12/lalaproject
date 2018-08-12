@extends('templates.admin-templates')

@section('content')
<div class="container admin-category-show-box">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <a class="btn btn-success form-control mt-3" href="/admin-create-category">สร้างหมวดหมู่</a>
      <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Category Image</th>
            <th scope="col">Category Name</th>
            <th scope="col">Category Suggest</th>
            <th scope="col">แก้ไข</th>
            <th scope="col">ลบ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($show_category as $show_categorys)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td><img class="admin-category-img" src="/assets/img/category/{{$show_categorys->category_img}}" alt="category_img"></td>
            <td>{{$show_categorys->category_name}}</td>
            <td>
                @if($show_categorys->category_suggest)
                  <p><i class="fas fa-check"></i></p>
                @else
                  <p><i class="fas fa-times"></i></p>
                @endif
            </td>
            <td>
              <a href="/admin-edit-category/{{$show_categorys->category_id}}" class="btn btn-warning form-control" href="#">แก้ไข</a>
            </td>
            <td>
              <form action="/admin-delete-category/{{$show_categorys->category_id}}" method="post">
                <input type="hidden" name="category_id" value="{{$show_categorys->category_id}}">
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
