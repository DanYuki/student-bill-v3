@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar tagihan</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <a href="{{route('attach-bill', $student->student_id)}}" class="btn btn-success mb-3">Tambah Tagihan</a><br>
                    <table class="table">
                        <thead class="table-dark">
                            <th>No.</th>
                            <th>Bill Name</th>
                            <th>Added at</th>
                            <th>Bill Amount</th>
                        </thead>
                        <tbody>
                            @forelse($s_bills as $s_bill)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$bills[$s_bill->bill_id]}}</td>
                                <td>{{$s_bill->created_at}}</td>
                                <td>@convertRp($s_bill->bill_amount)</td>
                            </tr>
                            @empty
                            There's nothing here

                            @endforelse
                            <tr class="table-dark">
                                <td></td>
                                <td></td>
                                <td>Total</td>
                                <td>@convertRp(150000)</td>
                            </tr>
                        </tbody>
                    </table>
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
                </select>
            </form>
        </div>
        <div class="col-md-5 border ms-auto">
            One of three columns
        </div>
    </div>
</div>
@endsection