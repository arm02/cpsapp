<html lang="en">
<head>
   <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
</head>
<body>
    <div class="container">
        <div class="panel panel-default">
          <div class="panel-body">
          	<a href="{{ url('pdf')}}">
          		<button class="btn btn-success">Download PDF</button></a>
          	<a href="{{ url('word')}}">
          		<button class="btn btn-success">Download Word</button></a>
            <a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>

            <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ url('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                @csrf
 
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
 
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
 
                <input type="file" name="import_file" />
                <button class="btn btn-primary">Import File</button>
            </form>
 
          </div>
        </div>
    </div>
</body>
</html>