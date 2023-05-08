<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Excel</title>
</head>

<body>
    <form action="{{route('importx')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="spreadsheet">

        <button type="submit">Submit</button>
    </form>
</body>

</html>