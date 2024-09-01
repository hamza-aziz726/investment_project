@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="javascript:void(0)">App</a></li>
				<li class="breadcrumb-item"><a href="javascript:void(0)">Transaction</a></li>
			</ol>
		</div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header d-flex justify-content-end">
                        <a href="#" class="btn btn-primary">New Investment</a>
                    </div> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Investment Plan</th>
                                        <th>Transaction Id</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->user->name }}</td>
                                        <td>{{ $transaction->investmentPlan->name }}</td>
                                        <td>{{ $transaction->transaction_id }}</td>
                                        <td class="d-flex align-items-center">
                                            <span id="status-badge" class="badge 
                                                @if($transaction->status == 0) badge-warning
                                                @elseif($transaction->status == 1) badge-primary
                                                @else badge-danger @endif">
                                                {{ $transaction->status == 0 ? 'Pending' : ($transaction->status == 1 ? 'Approved' : 'Rejected') }}
                                            </span>

                                            @if(Auth()->user()->role == 'admin')
                                                <i id="status-edit" class="fa-regular fa-pen-to-square ms-2" style="cursor:pointer;"></i>
                                                <select class="form-select d-none ms-2" name="status_edit" id="status_edit">
                                                    <option value="0" @if($transaction->status == 0) selected @endif>Pending</option>
                                                    <option value="1" @if($transaction->status == 1) selected @endif>Approved</option>
                                                    <option value="2" @if($transaction->status == 2) selected @endif>Rejected</option>
                                                </select>
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

@section('script')
<script>
    $(document).ready(function() {
        $("#status-edit").on('click', function() {
            $(this).hide(); // Hide the edit icon
            $("#status_edit").removeClass('d-none'); // Show the select box
        });

        $("#status_edit").on('change', function() {
        var selectedStatus = $(this).val();
        var transactionId = {{ $transaction->id }}; // Pass the transaction ID

        $.ajax({
            url: "{{ route('transaction.updateStatus') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                status: selectedStatus,
                transaction_id: transactionId
            },
            success: function(response) {
                if(response.status === 'success') {
                    var statusBadge = $("#status-badge");
                    // Update the status badge text and class based on the new status
                    if(selectedStatus == 0) {
                        statusBadge.text('Pending').removeClass().addClass('badge badge-warning');
                    } else if(selectedStatus == 1) {
                        statusBadge.text('Approved').removeClass().addClass('badge badge-primary');
                    } else {
                        statusBadge.text('Rejected').removeClass().addClass('badge badge-danger');
                    }
                    $("#status_edit").addClass('d-none'); // Hide the select box
                    $("#status-edit").show(); // Show the edit icon again
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + xhr.responseText);
            }
            });
        });
    });
</script>
@endsection

