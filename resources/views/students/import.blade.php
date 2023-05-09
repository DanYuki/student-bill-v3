<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/basic.css')}}">
    <link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
    <title>Import Excel</title>
</head>

<body>
    
    <form action="{{route('importx')}}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        <input type="file" name="spreadsheet" class="dz-default dz-danger" class="file form-control">

        <button type="submit">Submit</button>
    </form>
    <script src="{{asset('js/dropzone.js')}}"></script>
</body>

</html>