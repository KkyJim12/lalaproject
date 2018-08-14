@extends('templates.admin-templates')

@section('content')
<div class="admin-category-show-box">
  <div class="justify-content-center">
    <div class="col-lg-12">
      @if(session('error'))
      <div class="alert alert-danger">
          <ul>
            {{session('error')}}
          </ul>
      </div>
      @endif
      <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Course Max</th>
            <th scope="col">Admin</th>
            <th scope="col">Add Course</th>
            <th scope="col">Ban</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td><img class="admin-category-img" src="/assets/img/profile/{{$user->user_img}}" alt="slide_img"></td>
            <td>{{$user->user_fname}} {{$user->user_lname}}</td>
            <td>{{$user->user_email}}</td>
            <td>{{$user->user_gender}}</td>
            <td>
              <p style="text-align:center;">{{$user->course_qty_max}}</p>
            </td>
            <td>
              @if($user->user_admin == 1)
              <p><i class="fas fa-check"></i></p>
              @else
              <p><i class="fas fa-times"></i></p>
              @endif
            </td>
            <td>
              <button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#addqtymodal">
                เพิ่ม
              </button>
              <!--modal-->
              <div class="modal fade" id="addqtymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">จำนวนที่เพิ่ม</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="/admin-add-course-qty-process/{{$user->user_id}}" method="post">
                        <input class="form-control" type="integer" name="course_qty_max" placeholder="กรอกจำนวนที่จะให้เปลี่ยน">
                        <input type="hidden" name="user_id" value="{{$user->user_id}}">
                        @csrf
                        <button class="btn btn-success form-control mt-3" type="submit">เพิ่มเป็น</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--end modal-->
            </td>
            <td>
              @if($user->user_admin == 1)
                <button class="btn btn-danger form-control" disabled>ไม่สามารถแบนได้</button>
              @else
              <form action="/admin-ban-user/{{$user->user_id}}}" method="post">
                <input type="hidden" name="slide_id" value="{{$user->user_id}}">
                @csrf
                <button class="btn btn-danger form-control" onclick="return confirm('คุณต้องการแบนจริงไหม?')" type="submit">แบน</button>
              </form>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
