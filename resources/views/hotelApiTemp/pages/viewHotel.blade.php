@extends('hotelApiTemp.layouts.master')

@section('title', 'View Hotel')

@section('content')
<div class="container my-5">
    <div class="card shadow rounded-4">
        <div class="row g-0">
            <div class="col-md-6">
                @if($hotel->Images && count(json_decode($hotel->Images)) > 0)
                    <img src="{{ json_decode($hotel->Images)[0] }}" class="img-fluid rounded-start" alt="Hotel Image">
                @else
                    <img  src="{{ asset('defaultImages/defaultHotel.jpg') }}" class="img-fluid rounded-start" alt="No Image">
                @endif
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h3 class="card-title">{{ $hotel->HotelName }}</h3>
                    <p class="text-muted mb-2"><strong>Rating:</strong> {{ $hotel->HotelRating }}★</p>
                    <p><strong>Address:</strong> {{ $hotel->Address }}</p>
                    <p><strong>City:</strong> {{ $hotel->CityName }} ({{ $hotel->CityId }})</p>
                    <p><strong>Country:</strong> {{ $hotel->CountryName }} ({{ $hotel->CountryCode }})</p>
                    <p><strong>Phone:</strong> {{ $hotel->PhoneNumber }}</p>
                    <p><strong>Fax:</strong> {{ $hotel->FaxNumber }}</p>
                    <p><strong>Pin Code:</strong> {{ $hotel->PinCode }}</p>
                    <p><strong>Check-In:</strong> {{ $hotel->CheckInTime }} | <strong>Check-Out:</strong> {{ $hotel->CheckOutTime }}</p>
                </div>
            </div>
        </div>

        <div class="card-body border-top">
            <h5>Description</h5>
            <p>{!! nl2br(e($hotel->Description)) !!}</p>
        </div>

        <div class="card-body border-top">
            <h5>Facilities</h5>
            @php $facilities = $hotel->HotelFacilities; @endphp
            @if($facilities)
                <ul class="list-group list-group-flush">
                    @foreach($facilities as $facility)
                        <li class="list-group-item">{{ $facility }}</li>
                    @endforeach
                </ul>
            @else
                <p>No facilities listed.</p>
            @endif
        </div>

        <div class="card-body border-top">
            <h5>Nearby Attractions</h5>
            @php $attractions = $hotel->Attractions; @endphp
            @if($attractions)
                <div>{!! collect($attractions)->values()->implode(' ') !!}</div>
            @else
                <p>No attractions listed.</p>
            @endif
        </div>

        <div class="card-body border-top">
            <h5>Map Location</h5>
            @if($hotel->Map)
                @php
                    [$lat, $lng] = explode('|', $hotel->Map);
                @endphp
                <div class="ratio ratio-16x9">
                    <iframe
                        src="https://www.google.com/maps?q={{ $lat }},{{ $lng }}&hl=es;z=14&output=embed"
                        allowfullscreen
                        loading="lazy"
                        class="rounded"
                    ></iframe>
                </div>
            @else
                <p>Map location not available.</p>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Optional: You can include any custom JS here -->
@endpush
