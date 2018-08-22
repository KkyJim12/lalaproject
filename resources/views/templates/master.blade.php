<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="google-signin-client_id" content="330857847010-j3q0mn7ksis1ck3uc5scuf51ci2cpf9e.apps.googleusercontent.com">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-social.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/dropzone.min.css">
    <link href="/assets/css/hover.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="/assets/js/jquery.loading-indicator.min.js"></script>
    <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/js/custom.js" type="text/javascript"></script>
    <script src="/assets/js/dropzone.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  </head>
  <body>
    <script>

        Dropzone.autoDiscover = false;

        $(function(){
            $("#PhotosUpload").dropzone({
                url: "/backstage/process/uploadProductSubImage.do",
                maxFilesize: 2,
                acceptedFiles: "image/*",
                addRemoveLinks: true,
                dictDefaultMessage: "<b>ลากและวางรูปที่นี่</b><br /><small class=\"text-muted\">หรือคลิกที่ปุ่มด้านล่างเพื่อเลือกไฟล์</small>",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                clickable: "#manualUploadBoxTriggerButton",
                success: function(file, response){
                    if(response.status == "ok"){
                        console.log("[ImageUpload] Upload OK: " + response.fileID + ", UUID: " + file.upload.uuid);
                        $("#PhotosDiv").append("<input class=\"gtPhotoElement\" type=\"hidden\" data-uuid=\"" + file.upload.uuid + "\" name=\"course_other_img[]\" value=\"" + response.fileID + "\" />");
                    }else{
                        console.log("[ImageUpload] [ERR] Upload exception:");
                        console.log(response);
                    }
                },
                removedfile: function(file) {
                    console.log("[ImageUpload] Remove by UUID: " + file.upload.uuid);
                    $(".pmtCarPhotoElement[data-uuid=\"" + file.upload.uuid + "\"]").remove();
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
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
