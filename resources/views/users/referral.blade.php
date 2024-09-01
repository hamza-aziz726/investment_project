@extends('layouts.app')

@section('styles')
<style>
    #referralCode {
        cursor: pointer;
        display: inline-block;
        padding: 0.2rem 0.4rem;
        border: 1px solid #ddd;
        border-radius: 0.25rem;
        background-color: #f8f9fa;
        transition: background-color 0.3s;
    }

    #referralCode:hover {
        background-color: #e2e6ea;
        border-color: #bbb;
    }

</style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Your Referral Code: 
                            <small id="referralCode" class="text-primary">{{ Auth()->user()->referral_code }}</small>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Reffral Name</th>
                                        <th>Email</th>
                                        <th>Amount</th>
                                        <th>Total Referrals</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 0;
                                    @endphp
                                    @foreach ($matchingUsers as $referral)
                                        @php
                                            $count++;
                                        @endphp
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td><a href="{{ route('referral.details',$referral->id) }}">{{ $referral->name }}</a></td>
                                            <td><a href="{{ route('referral.details',$referral->id) }}">{{ $referral->email }}</a></td>
                                            <td>${{ $emailAmountReferralMap[$referral->email]['balance'] }}</td>
                                            <td>{{ $emailAmountReferralMap[$referral->email]['referral_count'] }}</td>
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
        $('#referralCode').on('click', function() {
            // Create a temporary textarea to copy text
            var $temp = $('<textarea>');
            $('body').append($temp);
            $temp.val($(this).text().trim()).select();
            document.execCommand('copy');
            $temp.remove();
            
            // Optionally show a notification
            alert('Referral code copied to clipboard!');
        });
    });
</script>
@endsection
