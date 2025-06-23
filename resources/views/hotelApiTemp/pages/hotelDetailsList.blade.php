@extends('hotelApiTemp.layouts.master')

@section('title', 'Hotel Details List')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Hotels List</h4>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Hotel Name</th>
                            <th scope="col">City</th>
                            <th scope="col">Country</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Pin Code</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hotels as $index => $hotel)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $hotel->HotelName }}</td>
                                <td>{{ $hotel->CityName }}</td>
                                <td>{{ $hotel->CountryName }}</td>
                                <td>{{ $hotel->HotelRating ?? 'N/A' }}</td>
                                <td>{{ $hotel->PinCode ?? 'N/A' }}</td>
                                <td>{{ $hotel->PhoneNumber ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('hotel.view', $hotel->HotelCode) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No hotels found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
