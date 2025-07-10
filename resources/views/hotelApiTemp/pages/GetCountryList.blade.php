@extends('hotelApiTemp.layouts.master')

@section('title', 'Country List')

@section('content')
<div class="container mt-4">
    <button id="update-country-list" class="btn btn-primary mb-3">
        Update Country List
    <small>(Run Only Once in 3 weeks)</small>
    </button>
    <div id="ajax-country-result"></div>
    <h2 class="mb-4">Country List</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Country Code</th>
                <th>Country Name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($countries as $index => $country)
                <tr>
                    <!-- Calculate the row number relative to pagination -->
                    <td>{{ $countries->firstItem() + $index }}</td>
                    <td>{{ $country->code }}</td>
                    <td>{{ $country->name }}</td>
                    <td>{{ $country->created_at ? $country->created_at->format('Y-m-d') : '-' }}</td>
                    <td>{{ $country->updated_at ? $country->updated_at->format('Y-m-d') : '-' }}</td>
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
        {{ $countries->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

@push('scripts')

<script>
    const updateButton = document.getElementById('update-country-list');
    updateButton.addEventListener('click', function() {
        updateButton.disabled = true;
        fetch('/api/hotels/show-countries')
            .then(response => response.json())
            .then(data => {
                if (data.Status.Code === 200) {
                    updateButton.disabled = false;
                    document.getElementById('ajax-country-result').innerHTML = '<div class="alert alert-success">Country list updated successfully!</div>';
                    //give delay for location.reload
                    setTimeout(() => {
                        location.reload(); // Reload the page to show updated data
                    }, 2000); // 2 seconds delay
                } else {
                     updateButton.disabled = false;
                    document.getElementById('ajax-country-result').innerHTML = '<div class="alert alert-danger">Failed to update country list.</div>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('ajax-country-result').innerHTML = '<div class="alert alert-danger">An error occurred while updating the country list.</div>';
            });
    });
</script>

@endpush


