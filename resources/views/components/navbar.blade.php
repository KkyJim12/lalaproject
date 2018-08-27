<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/"><img src="/assets/img/logo/logo.png" alt="logo" style="width:150px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mr-auto">
        <form class="form-inline" method="get" action="/search-data">
          <div class="input-group">
            <input type="text" name="search_data" class="form-control" placeholder="ค้นหาชื่อคอร์ส หรือ สถานที่เรียน" style="width:600px;">
              <div class="input-group-prepend">
                @csrf
                <button class="btn btn-success" type="submit" name="button"><i class="fas fa-search"></i></button>
              </div>
          </div>
        </form>
      </ul>
      <ul class="navbar-nav ml-auto mr-3">
      @if(session('user_log'))
        <li class="nav-item mr-3"><a class="nav-link" href="/show-course/{{session('user_id')}}">คอร์สของฉัน</a></li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="profile-img mr-2" src="/assets/img/profile/{{session('user_img')}}" alt="user_img">
              {{session('user_fname')}}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              @if(session('user_admin'))
              <a class="dropdown-item" href="/admin">Admin</a>
              @endif
              <a class="dropdown-item" href="/profile/{{session('user_id')}}">ตั้งค่าโปรไฟล์</a>
              <a class="dropdown-item" href="/logout-process">ออกจากระบบ</a>
            </div>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="/login">Log in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
        </li>
      </ul>
      @endif
    </div>
  </div>
</nav>
