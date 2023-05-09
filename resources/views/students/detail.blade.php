@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $student->student_name }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @forelse($s_bills as $s_bill)
                        
                    @empty
                    There's nothing here

                    @endforelse
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 border">
            <h2 class="">Daftar Tagihan</h2>
            <form action="{{route('attach-bill', $student->student_id)}}" method="post">
                <label for="bill_id" class="fw-bold">Student</label>
                <select name="bill_id">
                    @foreach($bills as $bill)
                    <option value="{{$bill->bill_id}}">{{$bill->bill_name}}</option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="col-md-5 border ms-auto">
            One of three columns
        </div>
    </div>
</div>
@endsection