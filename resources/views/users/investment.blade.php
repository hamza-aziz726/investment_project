@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="javascript:void(0)">App</a></li>
				<li class="breadcrumb-item"><a href="javascript:void(0)">Investment</a></li>
			</ol>
		</div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-end">
                        <a href="{{ route('add.investment') }}" class="btn btn-primary">New Investment</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Investment Plan</th>
                                        <th>Amount</th>
                                        <th>Payment Proof</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($investments as $investment)
                                    <tr>
                                        <td>{{ $investment->id }}</td>
                                        <td>{{ $investment->planName->name }}</td>
                                        <td>{{ $investment->amount }}</td>
                                        <td>
                                            @if($investment->payment_proof)
                                                <img src="{{ asset('storage/' . $investment->payment_proof) }}" alt="Payment Proof" style="max-width: 80px; max-height: 80px;">
                                            @else
                                                No Payment Proof
                                            @endif
                                        </td>
                                        <td>
                                            @if($investment->status == 0)
                                            <span class="badge badge-warning">Pending</span>
                                            @elseif($investment->status == 1)
                                            <span class="badge badge-primary">Approved</span>
                                            @else
                                            <span class="badge badge-danger">Rejected</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
