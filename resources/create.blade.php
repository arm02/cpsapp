<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	<script type="text/javascript" src="{{asset('css/app.js')}}"></script>
</head>
<body>
<div class="container">
	<form method="post" action="{{url('simpan')}}">
		@csrf
		<div class="row">
			<div class="col-md-4"></div>
			<div class="form-group col-md-4">
				<label>Judul:</label>
				<input type="text" name="judul" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="form-group col-md-4">
				<label>Keterangan</label>
				<textarea class="form-control" name="keterangan"></textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="form-group col-md-4">
				<label>Tanggal</label>
				<input type="date" name="tanggal" class="form-control">
			</div>
		</div>
	</form>
</div>
</body>
</html>