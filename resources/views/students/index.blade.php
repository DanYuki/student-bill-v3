<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>

<body>
    @if(Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
    @endif
    <p>This is student controller index page</p>
    <a href="/student/import"><button>Import siswa</button></a>

    <table>
        <thead>
            <th>No.</th>
            <th>Student Name</th>
            <th>Class</th>
            <th>NISN</th>
            <th>Gender</th>
            <th>Birthdate</th>
        </thead>
        <tbody>
            @forelse($students as $student)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$student->student_name}}</td>
                <td>{{$student->class}}</td>
                <td>{{$student->nisn}}</td>
                <td>
                    @if ($student->gender === 'L')
                    Male
                    @else
                    Female
                    @endif
                </td>
                <td>{{$student->birthdate}}</td>
            </tr>
            @empty
            <p>NO DATA</p>
            @endforelse
        </tbody>
    </table>
</body>

</html>