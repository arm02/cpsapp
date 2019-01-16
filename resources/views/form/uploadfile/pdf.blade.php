<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    table, th, td{
      border: 1px solid black;
      border-collapse: collapse;
      margin: auto;
    }
    th, td {
      padding: 5px;
      text-align: left;
    }
    a {
      text-align: center;
}
 .footer {
   position: absolute;
   left: 0;
   bottom: 0;
   width: 100%;
   color: black;
   text-align: right;
}
  </style>
</head>
<body>
  <img src="./gambar/capstone.jpeg" style="width: 100px; margin-left: 600px;">
<h1 style="text-align: center">Capstone Indonesia</h1>
<h1 style="text-align: center">IT Developer</h1>
<h2>Laporan Upload File</h1>
<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>File</th>
    </tr>
  </thead>
  <tbody>
   <?php
              $i= 1;
              $l = \App\UploadFile::all();
              ?>
              @foreach($l as $q)
            <tr>
              <th scope="row">{{$i++}}</th>
              <td>{{$q->nama}}</td>
              <td>{{$q->file}}</td>
              @endforeach
  </tbody>
</table>
<div class="footer">
<p>Jalan Teratai 7 No.47 <br>
  Kampung Makasar, Jakarta Timur <br>  

  10570 DKI Jakarta
  <br>
  (62) 813 - 9008 0691
  <br>
  (62) 812 - 1022 2119
  <br>
  www.capstoneindonesia.net</p>

</div>

</div>
</body>
</html>