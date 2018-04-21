@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">API Authentication Manager</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Manage API Authentication Credentials.
                </div>
            </div>

            <passport-clients class="mt-3"></passport-clients>
            <passport-authorized-clients class="mt-3"></passport-authorized-clients>
            <passport-personal-access-tokens class="mt-3"></passport-personal-access-tokens>
        </div>
    </div>
</div>
@endsection
