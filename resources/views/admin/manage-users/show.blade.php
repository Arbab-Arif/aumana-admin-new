@extends('admin.layouts.master')

@section('page-title',"User Details")

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <h1>User Detail</h1>

                <ul id="user-list">
                    <li><strong>Full Name:</strong> {{$user->name}} </li>
                    <li><strong>Email:</strong> {{$user->email}} </li>
                    <li><strong>First Address:</strong> {{$user->address ?? 'N/A'}} </li>
                    <li><strong>Second Address:</strong> {{$user->address_2 ?? 'N/A'}} </li>
                    <li><strong>Country:</strong> {{$user->country ?? 'N/A'}} </li>
                    <li><strong>State:</strong> {{$user->state ?? 'N/A'}} </li>
                    <li><strong>Zip Code:</strong> {{$user->zip_code ?? 'N/A'}} </li>
                    <li><strong>City:</strong> {{$user->city ?? 'N/A'}} </li>
                </ul>
            </div>
        </section>
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/admin-assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('/admin-assets/js/sweetalert.min.js') }}"></script>
@endpush

