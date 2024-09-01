@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth::user()->role == 'admin')
        <h2>Admin Dashboard</h2>
    @elseif (Auth::user()->role == 'user')
        <h2>User Dashboard</h2>
    @else
        <h2>Unknown Role</h2>
    @endif
</div>
@endsection