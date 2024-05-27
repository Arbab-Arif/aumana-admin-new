@extends('admin.layouts.master')

@section('page-title',"Manage Contact-Us Users")

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Contact-Us Users</h1>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Manage Contact-Us Users</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $key => $value)
                                    <tr>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->phone_number }}</td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(function () {
            $('#datatable').DataTable();
        });
    </script>
@endpush

