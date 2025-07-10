@extends('hotelApiTemp.layouts.master')

@section('title', 'Get City List India')

@section('content')
<div class="container">
    <div class="container mt-4">
        <button id="update-city-list" class="btn btn-primary mb-3">
            Update Indian city List
            <small>(Run Only Once in 3 weeks)</small>
        </button>
        <div id="ajax-city-result"></div>
        <h2 class="mb-4">City List India</h2>

        <table class="table table-striped table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>City Code</th>
                    <th>City Name</th>
                    <!-- <th>Created At</th> -->
                    <!-- <th>Updated At</th> -->
                </tr>
            </thead>
            <tbody>
                @forelse ($cities as $index => $city)
                <tr>
                    <!-- Calculate the row number relative to pagination -->
                    <td>{{ $cities->firstItem() + $index }}</td>
                    <td>{{ $city->city_code }}</td>
                    <td>{{ $city->city_name }}</td>
                    <!-- <td>{{ $city->created_at ? $city->created_at->format('Y-m-d') : '-' }}</td> -->
                    <!-- <td>{{ $city->updated_at ? $city->updated_at->format('Y-m-d') : '-' }}</td> -->
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No countries found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $cities->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const updateButton = document.getElementById('update-city-list');
    updateButton.addEventListener('click', function() {
        updateButton.disabled = true;
        fetch('/api/hotels/GetCityListIndia', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('API Response:', data);
                if (data.success === true) {
                    updateButton.disabled = false;
                    document.getElementById('ajax-city-result').innerHTML =
                        '<div class="alert alert-success">City list updated successfully!</div>';
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else {
                    document.getElementById('ajax-city-result').innerHTML =
                        '<div class="alert alert-danger">Error updating city list: ' + (data.message || 'Unknown error') + '</div>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('ajax-city-result').innerHTML =
                    '<div class="alert alert-danger">An error occurred while updating the city list.</div>';
            });

    });
</script>
@endpush
