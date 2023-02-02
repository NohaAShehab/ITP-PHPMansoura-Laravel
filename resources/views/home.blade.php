@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @can('isAdmin')
                            <h1 style="color: purple"> You are the Admin </h1>
                    @elsecan('isUser')
                            <h1 style="color: green"> You are the User </h1>
                    @elsecan('isManager')
                            <h1 style="color: red"> You are the Manager </h1>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
