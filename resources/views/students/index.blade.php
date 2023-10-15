<!-- @if(Session::has('message'))
<div class="alert alert-success">
    {{Session::get('message')}}
</div>
@endif
<p>This is student controller index page</p>
<a href="/student/import"><button>Import siswa</button></a>

<table class="table">
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
</table> -->

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Student List') }}</div>

                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif
                    <a href="/student/import" class="btn btn-primary">Import</a>
                    <a href="/student/add" class="btn btn-primary">Add Student</a>
                    <table class="table">
                        <thead>
                            <th>No.</th>
                            <th>Student Name</th>
                            <th>Class</th>
                            <th>NISN</th>
                            <th>Gender</th>
                            <th>Birthdate</th>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                            <tr>
                                <td>{{($students->currentpage()-1) * $students->perpage() + $loop->iteration}}</td>
                                <td><a href="{{route('student.show', $student->student_id)}}">{{$student->student_name}}</a></td>
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
                            <div class="alert alert-danger">
                                Data belum ada
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection