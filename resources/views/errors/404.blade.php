<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="google-signin-client_id" content="330857847010-j3q0mn7ksis1ck3uc5scuf51ci2cpf9e.apps.googleusercontent.com">
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
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.1&appId=548224705534255&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary navbar-mod">
  <div class="container">
  <a class="navbar-brand" href="/">อบรม.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="true" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <form class="form-inline" method="get" action="/search-data">
        <div class="input-group">
          <input type="text" name="search_data" class="form-control" placeholder="ค้นหา">
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

<div class="container">
  <div class="row">
    <div class="col-lg-12 mt-5">
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <h1 style="text-align:center; font-size:200px;">ไม่พบหน้านี้</h1>
    </div>
  </div>
</div>
@include('components.footer')
</body>
</html>
