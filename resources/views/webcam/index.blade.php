@extends('layouts.app')

@section('content')
<style type="text/css">
body { font-family: Helvetica, sans-serif; }
h2, h3 { margin-top:0; }
form { margin-top: 15px; }
form > input { margin-right: 15px; }
</style>

<div class="container">

    <div class="card text-center">
      <div class="card-header">
        Absensi
    </div>
    <div class="card-body">
        <div class="text-center">
            <img src="../gambar/capstone.jpeg" class="rounded" alt="..." style="width: 300px;height: 300px;">
        </div>
    <div class="card-body">
    
    <div id="my_camera" style="display: none;"></div>
    <script type="text/javascript" src="../webcam.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    
    <!-- Configure a few settings and attach camera -->
    <script language="JavaScript">
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach( '#my_camera' );
    </script>

      <form>
        <input type=button value="Mulai Absen Hari ini" id="button1" class="btn btn-primary" onClick="take_snapshot()">
    </form>
    <center>
    <div id="results" style="width: 30%;"></div>
    </center>


    <script language="JavaScript">
        function take_snapshot() {
            // take snapshot and get image data
                // display results in page
                document.getElementById('button1').style.display = "none";
            Webcam.snap( function(data_uri) {
                document.getElementById('results').innerHTML = 
                    '<form  method="post" enctype="multipart/form-data" action="{{url('webcam/save')}}"> '+
                    '@csrf'+
                    '<input class="form-control" placeholder="Masukan Nama Anda" name="nama" type="text">'+
                    '<img style="display: none;" src="'+data_uri+'"/>'+
                    '<input type="hidden" name="gambar" value="'+data_uri+'">' +
                    '<br><button onClick="konfirmasiDulu()" class="btn btn-primary" type="submit">Absen</button>'+
                    '</form>';
            } );
        }

        function konfirmasiDulu(){  
                var konfirmasi = confirm("Silakan Klik Tombol Salah Satu Tombol");
                var text = "";
                
                if(konfirmasi === true) {
                    text = "Kamu klik Tombol OK";
                }else{
                    text = "Kamu klik Tombol Cancel";
                }
                
                document.getElementById("hasil").innerHTML = text;
            }
    </script>

    </div>
    <div class="card-footer text-muted">
        Copyright ©2019 Casptone Indonesia
    </div>
</div>
</div>

@endsection