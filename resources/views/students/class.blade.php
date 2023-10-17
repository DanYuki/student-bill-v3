@extends('layouts.app')

@section('content')


<div class="container">
    <!-- Back button -->
    <a href="{{route('student.index')}}" class="btn btn-primary mb-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
        </svg>
        Back
    </a>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Kelas {{__($class)}}</div>
            <div class="card-body">
                @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
                @endif
                <a href="#" class="btn btn-success">Tambah Tagihan Kelas</a>
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
                            <td>{{$loop->iteration}}</td>
                            <td><a href="{{route('student.show', $student->student_id)}}">{{$student->student_name}}</a></td>
                            <td>{{$student->class}}</td>
                            <td>{{$student->nisn}}</td>
                            <td>
                                {{ucwords($student->gender)}}
                            </td>
                            <td>{{date('d F Y', strtotime($student->birthdate))}}</td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            There's nothing here!
                        </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection