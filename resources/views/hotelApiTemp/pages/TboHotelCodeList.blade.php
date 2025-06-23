@extends('hotelApiTemp.layouts.master')

@section('title', 'Update TBO Hotel Code List')

@section('content')
<!--
Srinagar: 139456
New Delhi: 130443
Chandigarh: 114107
Hyderabad: 145710
Ahmedabad: 100263
Lucknow: 126666
-->

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form onsubmit="TboHotelCodeList()" id="tboHotelCodeListForm" action="#" method="POST" class="p-4 border rounded" style="max-width: 500px; margin:auto;">
    @csrf
    <div class="mb-3">
        <label for="cityCode" class="form-label">Select City</label>
        <select class="form-select" id="cityCode" name="city_code" required>
            <option value="" selected disabled>Choose a city</option>
            @php
            $permittedCities = [139456, 130443, 114107, 145710, 100263, 126666];
            @endphp
            @foreach ($cities as $city)
            @if(in_array($city->city_code, $permittedCities))
            <option value="{{ $city->city_code }}">{{ $city->city_name }}</option>
            @else
            <option value="{{ $city->city_code }}" disabled>{{ $city->city_name }} (Not Allowed)</option>
            @endif

            @endforeach
        </select>
    </div>
    <button id="form-button" type="submit" class="btn btn-primary w-100">Fetch Hotels</button>
</form>


<div class="container my-4">
    <h2 class="mb-4">TBO Hotel Code List</h2>

    @if($hotels->count() > 0)
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark text-nowrap">
                <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>City Code</th>
                    <th>Hotel Code</th>
                    <th>Hotel Name</th>
                    <th>Rating</th>
                    <th>Address</th>
                    <th>Attractions</th>
                    <th>Country</th>
                    <th>Description</th>
                    <th>Fax Number</th>
                    <th>Facilities</th>
                    <th>TripAdvisor Rating</th>
                    <th>TripAdvisor URL</th>
                    <th>Map (Lat|Lng)</th>
                    <th>Phone</th>
                    <th>Pin Code</th>
                    <th>Website</th>
                    <th>City Name</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hotels as $hotel)
                <tr>
                    <td>{{ $loop->iteration + ($hotels->currentPage() - 1) * $hotels->perPage() }}</td>
                     <td>
                         <button id="store-hotel-{{ $hotel->HotelCode }}" data-hotel-code="{{ $hotel->HotelCode }}" onclick="callHotelDetails()" class="btn btn-danger">Store</button>
                         <a href="{{ route('hotel.view', ['hotel_code' => $hotel->HotelCode]) }}" id="view-hotel-{{ $hotel->HotelCode }}" data-hotel-code="{{ $hotel->HotelCode }}" class="btn btn-success mt-2">
                            View
                         </a>
                    </td>
                    <td>{{ $hotel->city_code }}</td>
                    <td>{{ $hotel->HotelCode }}</td>
                    <td>{{ $hotel->HotelName }}</td>
                    <td>{{ $hotel->HotelRating ?? '-' }}</td>
                    <td>{{ Str::limit($hotel->Address, 50, '...') }}</td>
                    <td>
                        @if(!empty($hotel->Attractions))
                        <ul class="mb-0">
                            @foreach ($hotel->Attractions as $attr)
                            <li>{!! Str::limit(strip_tags($attr), 30, '...') !!}</li>
                            @endforeach
                        </ul>
                        @else
                        -
                        @endif
                    </td>
                    <td>{{ $hotel->CountryName ?? '-' }}</td>
                    <td>{{ Str::limit(strip_tags($hotel->Description), 100, '...') }}</td>
                    <td>{{ $hotel->FaxNumber ?? '-' }}</td>
                    <td style="max-width: 250px;">
                        @if(!empty($hotel->HotelFacilities))
                        <div style="max-height: 100px; overflow-y: auto;">
                            <ul class="mb-0 ps-3">
                                @foreach ($hotel->HotelFacilities as $facility)
                                <li style="white-space: normal;">{{ $facility }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @else
                        -
                        @endif
                    </td>

                    <td>{{ $hotel->TripAdvisorRating ?? '-' }}</td>
                    <td>
                        @if($hotel->TripAdvisorReviewURL)
                        <a href="{{ $hotel->TripAdvisorReviewURL }}" target="_blank" rel="noopener noreferrer">Review</a>
                        @else
                        -
                        @endif
                    </td>
                    <td>{{ $hotel->Map ?? '-' }}</td>
                    <td>{{ $hotel->PhoneNumber ?? '-' }}</td>
                    <td>{{ $hotel->PinCode ?? '-' }}</td>
                    <td>
                        @if($hotel->HotelWebsiteUrl)
                        <a href="{{ $hotel->HotelWebsiteUrl }}" target="_blank" rel="noopener noreferrer">Website</a>
                        @else
                        -
                        @endif
                    </td>
                    <td>{{ $hotel->CityName ?? '-' }}</td>
                    <td>{{ $hotel->created_at->format('Y-m-d H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $hotels->links() }}
    </div>

    @else
    <div class="alert alert-info">
        No hotel records found.
    </div>
    @endif
</div>

@endsection

@push('scripts')

<script>
    function callHotelDetails() {
        event.preventDefault();
        const hotelCode = event.target.getAttribute('data-hotel-code');
        const formButton = document.getElementById('store-hotel-' + hotelCode);
        formButton.innerHTML = 'Storing...';
        formButton.disabled = true;

        fetch('/api/hotels/TboHotelDetails', {
                method: 'POST',
                body: JSON.stringify({
                    hotel_code: hotelCode
                }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Hotel details stored successfully!');
                    formButton.innerHTML = 'Store';
                    formButton.disabled = false;
                } else {
                    formButton.innerHTML = 'Store';
                    formButton.disabled = false;
                    alert('Error storing hotel details: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while storing hotel details.');
            });
    }
    function TboHotelCodeList() {
        event.preventDefault();
        const form = document.getElementById('tboHotelCodeListForm');
        const formButton = document.getElementById('form-button');
        formButton.innerHTML = 'Fetching...';
        formButton.disabled = true;
        const formData = new FormData(form);
        const cityCode = formData.get('city_code');

        fetch('/api/hotels/TboHotelCodeList', {
                method: 'POST',
                body: JSON.stringify({
                    city_code: cityCode
                }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Hotels fetched successfully!');
                    formButton.innerHTML = 'Fetch Hotels';
                    formButton.disabled = false;
                } else {
                    formButton.innerHTML = 'Fetch Hotels';
                    formButton.disabled = false;
                    alert('Error fetching hotels: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while fetching hotels.');
            });
    }


</script>

@endpush
