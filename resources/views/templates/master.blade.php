<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="google-signin-client_id" content="330857847010-j3q0mn7ksis1ck3uc5scuf51ci2cpf9e.apps.googleusercontent.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-social.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link href="/assets/css/hover.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/js/custom.js" type="text/javascript"></script>
    <script src="/assets/js/owl.carousel.js" type="text/javascript"></script>

  </head>
  <body>


    <script type="text/javascript">
        $(document).ready(function(){
    $(".owl-carousel").owlCarousel({
                                    items:4 ,
                                    responsiveClass:true,
                                    responsive:{
                                        0:{
                                            items:1,
                                            nav:true
                                        },
                                        600:{
                                            items:3,
                                            nav:false
                                        },
                                        1000:{
                                            items:4,
                                            nav:true,
                                            loop:false
                                        }
                                    }
                                  });
    });
    </script>


    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.1&appId=548224705534255&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    @include('components.navbar')
    @include('components.menu')
    @yield('content')
    @include('components.footer')


  </body>

</html>
