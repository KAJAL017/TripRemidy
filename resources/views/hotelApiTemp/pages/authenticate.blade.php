@extends('hotelApiTemp.layouts.master')

@section('title', 'Authenticate with TBO')

@section('content')
<div class="container">
    <h2 class="my-4">TBO API Authentication</h2>

    <div class="mb-3">
        <strong>Client ID:</strong> {{ config('tbo.client_id') }}<br>
        <strong>Username:</strong> {{ config('tbo.username') }}<br>
        <strong>Password:</strong> {{ config('tbo.password') }}<br>
        <strong>End User IP:</strong> {{ config('tbo.end_user_ip') }}
    </div>

    @if(isset($auth))
    <div class="container my-4">
        <div class="alert alert-success">
            <strong>Authenticated!</strong> You are signed in.
            @php
            $expiresAt = Carbon\Carbon::parse($auth->expires_at);
            @endphp
            @if($expiresAt && $expiresAt->isFuture())
            <span class="text-success">Token is valid until {{ $expiresAt->format('Y-m-d H:i:s') }}</span>
            @else
            <span class="text-danger">Token has expired.</span>
            @endif
            <br>
            <strong>Token:</strong> {{ $auth->token_id }}
            <br>
            <button id="logoutBtn" class="btn btn-primary">Logout</button>

        </div>
        <div id="authResult" class="mt-3"></div>
        <div class="card shadow rounded">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Authentication Details</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover mb-0">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $auth->id }}</td>
                        </tr>
                        <tr>
                            <th>Client ID</th>
                            <td>{{ $auth->ClientId }}</td>
                        </tr>
                        <tr>
                            <th>Token ID</th>
                            <td>{{ $auth->token_id }}</td>
                        </tr>
                        <tr>
                            <th>End User IP</th>
                            <td>{{ $auth->EndUserIp }}</td>
                        </tr>
                        <tr>
                            <th>First Name</th>
                            <td>{{ $auth->first_name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td>{{ $auth->last_name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $auth->email ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Member ID</th>
                            <td>{{ $auth->member_id ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Agency ID</th>
                            <td>{{ $auth->agency_id ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Login Name</th>
                            <td>{{ $auth->login_name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Login Details</th>
                            <td>
                                <pre class="mb-0">{{ $auth->login_details ?? 'N/A' }}</pre>
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $auth->status ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Error Code</th>
                            <td>{{ $auth->error_code ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Error Message</th>
                            <td>{{ $auth->error_message ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Fetched At</th>
                            <td>{{ $auth->fetched_at ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Expires At</th>
                            <td>{{ $auth->expires_at ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $auth->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $auth->updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-warning">
        No authentication data found. You are not authenticated at the TBO hotel API. Kindly Generate a token.
        <button id="authenticateBtn" class="btn btn-primary">Get Token</button>

    </div>
    @endif




</div>
@endsection

@push('scripts')
<script>
    const authenticateBtn = document.getElementById('authenticateBtn');
    const logoutBtn = document.getElementById('logoutBtn');

    if (authenticateBtn) {
        authenticateBtn.addEventListener('click', function() {
            authenticateBtn.disabled = true;
            fetch('/api/hotels/test-auth', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    const resultDiv = document.getElementById('authResult');
                    if (data.status === 'success') {
                        authenticateBtn.disabled = false;
                        resultDiv.innerHTML = `<div class="alert alert-success">Token: ${data.token}</div>`;
                    } else {
                        authenticateBtn.disabled = false;
                        resultDiv.innerHTML = `<div class="alert alert-danger">Authentication failed.</div>`;
                    }
                })
                .catch(error => {
                    console.error(error);
                    document.getElementById('authResult').innerHTML = `<div class="alert alert-danger">An error occurred.</div>`;
                });
        });
    }

    if (logoutBtn) {
        logoutBtn.addEventListener('click', function() {
            logoutBtn.disabled = true;
            fetch('/api/hotels/logout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    const resultDiv = document.getElementById('authResult');
                    if (data.status === 'success') {
                        logoutBtn.disabled = false;
                        resultDiv.innerHTML = `<div class="alert alert-success">Logged out successfully.</div>`;
                    } else if (data.ExpiredRecords == true) {
                        logoutBtn.disabled = false;
                        resultDiv.innerHTML = `<div class="alert alert-warning">Token has expired. Please re-authenticate.</div>`;

                    } else {
                        resultDiv.innerHTML = `<div class="alert alert-danger">Logout failed.</div>`;
                        logoutBtn.disabled = false;
                    }
                })
                .catch(error => {
                    console.error(error);
                    document.getElementById('authResult').innerHTML = `<div class="alert alert-danger">An error occurred.</div>`;
                });
        });
    }
</script>
@endpush
