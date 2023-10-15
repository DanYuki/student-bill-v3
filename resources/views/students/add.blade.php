@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Students') }}</div>

                <div class="card-body">
                    <!-- Form -->
                    <form action="#" method="post">
                        <div class="mb-3">
                            <label class="form-label" for="s_name">Student Name</label>
                            <input class="form-control" type="text" name="s_name" id="s_name">
                        </div>

                        <div class="mb-3">
                            <label for="s_class">Class</label>
                            <select class="form-select" name="s_class" id="s_class">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>

                        <!-- Add validation for nisn -->
                        <div class="mb-3">
                            <label for="s_nisn">NISN</label>
                            <input class="form-control" type="text" name="s_nisn" id="s_nisn">
                        </div>

                        <div class="mb-3">
                            <label for="s_birthdate">Birthdate</label>
                            <input class="form-control" type="date" name="s_birthdate" id="s_birthdate">
                        </div>

                        <div class="mb-3">
                            <label for="gender">Gender</label>
                            <select class="form-select" name="gender" id="gender">
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>

                        <!-- Add validation for phone number -->
                        <div class="mb-3">
                            <label for="parent_number">Parent Phone Number</label>
                            <input class="form-control" type="text" name="parent_number" id="parent_number">
                        </div>
                        
                        <input class="btn btn-primary" type="submit" value="Submit Data">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection