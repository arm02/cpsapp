<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
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
<h2>Laporan Pengeluaran</h1>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Judul</th>
      <th>Jumlah</th>
      <th>tanggal</th>
      <th>Rincian</th>
    </tr>
  </thead>
  <tbody>
   
            <tr>
              <th>{{$pdfid->id}}</th>
              <td>{{$pdfid->judul}}</td>
              <td>{{$pdfid->jumlah}}</td>
              <td>{{$pdfid->tanggal}}</td>
              <td>{!!$pdfid->rincian!!}</td>
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

</body>
</html>