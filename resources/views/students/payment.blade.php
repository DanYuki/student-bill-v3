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
                            <div class="border">
                                <h2 class="">Tambah Tagihan</h2>
                                <form action="{{route('pay-bill-post', $s_bills[0]->student_id)}}" method="post">
                                    @csrf
                                    <label for="p_amount" class="fw-bold">Payment Amount</label>
                                    <input type="number" name="p_amount" class="form-control" max="{{$s_bills->sum('bill_amount')}}">

                                    <input type="hidden" name="student_id" value="{{$s_bills[0]->student_id}}">
                                    <button type="submit" class="btn btn-primary mt-3 mb-3">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection