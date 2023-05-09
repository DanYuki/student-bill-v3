@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Bills') }}</div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <a href="{{route('bill.create')}}" class="btn btn-success">Create New Bill</a><br>
                    <table class="table mt-3">
                        <thead class="table-dark text-center">
                            <th class="align-middle">No.</th>
                            <th class="align-middle">Bill Name</th>
                            <th class="align-middle col-2">Bill Amount</th>
                            <th class="align-middle">Bill Description</th>
                            <th class="align-middle">Action</th>
                        </thead>
                        <tbody>
                            @forelse($bills as $bill)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{stripslashes($bill->bill_name)}}</td>
                                <td class="text-center">@convertRp($bill->bill_amount)</td>
                                <td>{{stripslashes($bill->bill_description)}}</td>
                                <td align="center" class="form-inline col-md-3">
                                    <form onsubmit="return confirm('You sure want to do this?')" action="{{route('bill.destroy', $bill->bill_id)}}" method="post">
                                        <a href="{{route('bill.edit', $bill->bill_id)}}" class="btn btn-warning">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            No data
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection