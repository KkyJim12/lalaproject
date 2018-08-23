@extends('templates.admin-templates')

@section('content')
<div class="admin-category-show-box">
  <div class="justify-content-center">
    <div class="col-lg-12">
      <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Transfer Image</th>
            <th scope="col">User Name</th>
            <th scope="col">Course Name</th>
            <th scope="col">Course Price</th>
            <th scope="col">ดูข้อมูลเพิ่มเติม</th>
          </tr>
        </thead>
        <tbody>
          @foreach($transfer as $transfers)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td><img class="admin-category-img" src="/assets/img/slip/{{$transfers->transfer_img}}" alt="transfer_img"></td>
            <td>{{$transfers->transfer_user_name}}</td>
            <td>{{$transfers->transfer_course_name}}</td>
            <td>{{$transfers->transfer_course_price}}</td>
            <td>
              <a class="btn btn-primary form-control" href="/admin-see-transfer/{{$transfers->transfer_id}}">ดูข้อมูลเพิ่มเติม</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
