@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <!-- Back button -->
            <a href="{{route('student.index')}}" class="btn btn-primary mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                </svg> 
                Back
            </a>
            <div class="card">
                <div class="card-header">{{ __('Students') }}</div>

                <div class="card-body">
                    <!-- Form -->
                    <form action="{{route('store-student')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="student_name">Student Name</label>
                            <input class="form-control" type="text" name="student_name" id="student_name">
                        </div>
                        @error('student_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="mb-3">
                            <label for="class">Class</label>
                            <select class="form-select" name="class" id="class">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        @error('class')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <!-- Add validation for nisn -->
                        <div class="mb-3">
                            <label for="nisn">NISN</label>
                            <input class="form-control" type="text" name="nisn" id="nisn">
                        </div>
                        @error('nisn')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="mb-3">
                            <label for="birthdate">Birthdate</label>
                            <input class="form-control" type="date" name="birthdate" id="birthdate">
                        </div>
                        @error('birthdate')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="mb-3">
                            <label for="gender">Gender</label>
                            <select class="form-select" name="gender" id="gender">
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <!-- Add validation for phone number -->
                        <div class="mb-3">
                            <label for="parent_number">Parent Phone Number</label>
                            <input class="form-control" type="text" name="parent_number" id="parent_number">
                        </div>
                        @error('parent_number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <input class="btn btn-primary" type="submit" value="Submit Data">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection