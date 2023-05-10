@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 border">
                                <h2 class="">Tambah Tagihan</h2>
                                <form action="{{route('attach-bill-post', $student_id)}}" method="post">
                                    @csrf
                                    <label for="bill_info" class="fw-bold">Tagihan</label>
                                    <select name="bill_info" class="form-select">
                                        @foreach($bills as $bill)
                                        <option value="{{$bill->bill_id . '|' . $bill->bill_amount}}">{{stripslashes($bill->bill_name) . ' - '}}@convertRp($bill->bill_amount)</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="student_id" value="{{$student_id}}">
                                    <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                                </form>
                            </div>
                            <div class="col-md-5 border ms-auto">
                                One of three columns
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection