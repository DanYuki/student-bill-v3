@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar tagihan</div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="d-flex">
                        <a href="{{route('attach-bill', $student->student_id)}}" class="btn btn-success mb-3 me-3">Tambah Tagihan</a><br>
                        <a href="{{route('pay-bill', $student->student_id)}}" class="btn btn-success mb-3">Bayar Tagihan</a><br>
                    </div>
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
                            <tr class="table-light">
                                <td></td>
                                <td></td>
                                <td class="text-end fw-bold">Total : </td>
                                <td>@convertRp($s_bills->sum('bill_amount'))</td>
                            </tr>
                        </tbody>
                    </table>

                    <h3>Payment History</h3>
                    <table class="table">
                        <thead class="table-dark">
                            <th>No.</th>
                            <th>Paid at</th>
                            <th>Paid Amount</th>
                        </thead>
                        <tbody>
                            @forelse($p_histories as $p_history)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p_history->created_at}}</td>
                                <td>@convertRp($p_history->p_amount)</td>
                            </tr>
                            @empty
                            There's nothing here

                            @endforelse
                            <tr class="table-light">
                                <td></td>
                                <td class="text-end fw-bold">Total : </td>
                                <td>@convertRp($p_histories->sum('p_amount'))</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="container">
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
</div> -->
@endsection