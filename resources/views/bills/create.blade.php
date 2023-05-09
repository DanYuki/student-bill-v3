@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create new bill') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{route('bill.store')}}" method="post">
                        @csrf

                        <label for="bill_name" class="fw-bold">Name</label>
                        <input type="text" name="bill_name" class="form-control @error('bill_name') is-invalid @enderror">
                        @error('bill_name')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror

                        <label for="bill_amount" class="fw-bold">Amount/Nominal</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" name="bill_amount" class="form-control @error('bill_amount') is-invalid @enderror">
                            @error('bill_amount')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>

                        <label for="bill_description" class="fw-bold">Description</label>
                        <textarea name="bill_description" cols="30" rows="5" class="form-control @error('bill_description') is-invalid @enderror"></textarea>
                        @error('bill_description')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection