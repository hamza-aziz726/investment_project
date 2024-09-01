@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Investment</a></li>
				<li class="breadcrumb-item"><a href="javascript:void(0)">Add Investment</a></li>
			</ol>
		</div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('save.investment') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row p-4">
                            <div class="alert alert-info" role="alert">
                                Pay on this UPI <span class="text-warning">#000000000</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Select Plan</label>
                                <select name="investment_plan_id" id="" class="form-select" required>
                                    <option disabled selected>Choose a Plan</option>
                                    @foreach ($plans as $plan)
                                        <option value="{{ $plan->id }}">{{ $plan->name }} Packeg{{ $plan->min_amount }}-{{ $plan->max_amount }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Your Amount</label>
                                <input name="amount" type="number" class="form-control" placeholder="your amount" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Your UPI</label>
                                <input name="transaction_id" type="number" class="form-control" placeholder="your UPI" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Payment Proof</label>
                                <input name="payment_proof" type="file" class="form-control" placeholder="your UPI" required>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection