@extends('hotelApiTemp.layouts.master')

@section('title', 'Get Agency Balance')

@section('content')
<div class="container">
    <h2 class="my-4">TBO API Get Agency Balance</h2>
    <p>This page retrieves the agency balance using the TBO API.</p>
    <div class="alert alert-info">
        <strong>Note:</strong> Ensure you have authenticated with the TBO API before accessing this page.
    </div>
    <div id="result"></div>
    <button id="getBalanceBtn" class="btn btn-primary">Get Agency Balance</button>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const getBalanceBtn = document.getElementById('getBalanceBtn');
        getBalanceBtn.addEventListener('click', function() {
            getBalanceBtn.disabled = true;
            fetch('/api/hotels/GetAgencyBalance', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Accept-Encoding': 'gzip, deflate, br',
                    }
                })
                .then(res => res.json())
                .then(data => {
                    const resultDiv = document.getElementById('result');
                    if (data.Status === 1 && data.Error?.ErrorCode === 0) {
                        getBalanceBtn.disabled = false;
                        resultDiv.innerHTML = `
            <div class="alert alert-success">
                <strong>Cash Balance:</strong> ${data.CashBalance}<br>
                <strong>Credit Balance:</strong> ${data.CreditBalance}

            </div>`;
                    } else {
                        resultDiv.innerHTML = `<div class="alert alert-danger">
            Failed to retrieve balance. Error: ${data.Error?.ErrorMessage || 'Unknown error'}
        </div>`;
                    }
                })

                .catch(error => {
                    console.error(error);
                    document.getElementById('result').innerHTML = `<div class="alert alert-danger">An error occurred.</div>`;
                });
        })
    });
</script>
@endpush
