<!DOCTYPE html>

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
</style>
</head>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>

        <br>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Judul</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($test as $q)
                <input type="hidden" name="id" value="{{$q->id}}">
                <tr>
                    <td>{{$q->id}}</td>
                    <td>{{$q->judul}}</td>
                    <td>{{$q->keterangan}}</td>
                    <td>{{$q->tanggal}}</td>
                    <td><img src="./gambar/{{$q->gambar}}" style="width: 80px; height: 50px;"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    </body>
    </html>