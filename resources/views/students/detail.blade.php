@extends('layouts.app')

@section('content')

<?php
    $total_sum = $datas->sum('bill_amount') - $p_histories->sum('p_amount'); 
?>
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
                        <a href="{{route('attach-bill',$student_id)}}" class="btn btn-success mb-3 me-3">Tambah Tagihan</a><br>
                        <a href="{{route('pay-bill', $student_id)}}" class="btn btn-success mb-3 {{ ($total_sum == 0) ? 'disabled' : '' }}">Bayar Tagihan</a><br>
                    </div>
                    <table class="table">
                        <thead class="table-dark">
                            <th>No.</th>
                            <th>Bill Name</th>
                            <th>Added at</th>
                            <th>Bill Amount</th>
                        </thead>
                        <tbody>
                            @forelse($datas as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->bill_name}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>@convertRp($data->bill_amount)</td>
                            </tr>
                            @empty
                            <tr>
                                There's nothing here
                            </tr>

                            @endforelse
                            <tr class="table-light">
                                <td></td>
                                <td></td>
                                <td class="text-end fw-bold">Total : </td>
                                <td>@convertRp($datas->sum('bill_amount'))</td>
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
@endsection