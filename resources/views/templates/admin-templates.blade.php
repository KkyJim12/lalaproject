<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>bestskill-เว็บรวมคอร์สเรียน</title>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/js/custom.js" type="text/javascript"></script>
  </head>
  <body style="background-color:gray;">

    @include('components.navbar')
    <div class="mt-5">
      <div class="row">
        <div class="col-md-2">
          @include('components.admin-menu')
        </div>
        <div class="col-md-10">
          @yield('content')
        </div>
      </div>
    </div>
  </body>
</html>
