@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="javascript:void(0)">App</a></li>
				<li class="breadcrumb-item"><a href="javascript:void(0)">Investment Plans</a></li>
			</ol>
		</div>
        <form method="POST" action="{{ route('admin.investment.plans.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="name" placeholder="Plan Name" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <input type="number" name="min_amount" placeholder="Minimum" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <input type="number" name="max_amount" placeholder="Maximum" class="form-control" required>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary mt-3">Add Plan</button>
            </div>
        </form>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Investment Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Minimum Amount</th>
                                        <th>Maximum Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plans as $plan)
                                        <tr>
                                            <td>{{ $plan->id }}</td>
                                            <td>{{ $plan->name }}</td>
                                            <td>${{ $plan->min_amount }}</td>
                                            <td>${{ $plan->max_amount }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('admin.investment.plans.delete', $plan->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
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

        {{-- <ul>
            @foreach ($plans as $plan)
                <li>
                    {{ $plan->name }}: ${{ $plan->amount }}
                    <form method="POST" action="{{ route('admin.investment.plans.delete', $plan->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul> --}}
    </div>
@endsection
