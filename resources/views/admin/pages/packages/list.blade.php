@extends('admin.layouts.master')
@section('admin.content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content d-flex justify-content-between align-items-center">
                                    <h4 class="nk-block-title mb-0">Packages</h4>
                                    <a href="{{ route('admin.packages.create') }}">
                                        <button class="btn btn-primary"><em class="icon ni ni-plus px-1"></em> Add
                                            Package</button>
                                    </a>
                                </div>
                            </div>
                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <table class="datatable-init-export nowrap table" data-export-title="Export">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Package Name</th>
                                                <th>Badge</th>
                                                <th>Group Size</th>
                                                <th>Location</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($packages as $key => $package)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $package->name ?? 'N/A' }}</td>
                                                    <td>
                                                        @php
                                                            $badgeColors = [
                                                                'top-rated' => 'success',
                                                                'popular' => 'warning',
                                                                'new' => 'info',
                                                                'best-deal' => 'danger',
                                                            ];

                                                            $badgeText = [
                                                                'top-rated' => 'Top Rated',
                                                                'popular' => 'Popular',
                                                                'new' => 'New',
                                                                'best-deal' => 'Best Deal',
                                                            ];

                                                            $badgeKey = $package->badge ?? 'default';
                                                            $color = $badgeColors[$badgeKey] ?? 'secondary';
                                                            $text = $badgeText[$badgeKey] ?? 'N/A';
                                                        @endphp

                                                        @if ($package->badge)
                                                            <span class="badge rounded-pill badge-dim bg-outline-{{ $color }}">{{ $text }}</span>
                                                        @else
                                                            <span class="badge rounded-pill badge-dim bg-outline-secondary">N/A</span>
                                                        @endif
                                                    </td>


                                                    <td>{{ $package->group_size ?? 'N/A' }}</td>
                                                    <td>{{ $package->location ?? 'N/A' }}</td>
                                                    <td>
                                                        @if($package->price)
                                                        ₹{{ number_format($package->price, 2) }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.packages.edit', $package->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                        <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('admin.scripts')
    <script src="{{ admin_assets() }}/assets/js/libs/datatable-btnse1e3.js?ver=3.2.4"></script>
@endpush
