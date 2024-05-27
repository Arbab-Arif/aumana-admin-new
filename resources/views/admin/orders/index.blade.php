@extends('admin.layouts.master')

@section('page-title',"orders")

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Orders</h1>
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
                            {{--                            <div class="card-header">--}}
                            {{--                                <h3 class="card-title">Manage Image Size</h3>--}}
                            {{--                                <a href="{{route('create.size')}}" class="btn btn-primary float-right">Create</a>--}}
                            {{--                            </div>--}}

                            @if(session()->has('success_msg'))
                                <div class="alert alert-success alert-dismissible">
                                    {{ session()->get('success_msg') }}
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                </div>
                            @endif
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Order No</th>
                                        <th>User Name</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $key => $order)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{ $order->getUser->name }}</td>
                                            <td>{{ number_format($order->total_price,2) }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>
                                                <a href="{{route('admin.order.show',$order->id)}}" class="btn btn-info">Detail</a>
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
        </section>
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/admin-assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('/admin-assets/js/sweetalert.min.js') }}"></script>
    <script>
        $(function () {
            $('#datatable').DataTable();
        });
    </script>
@endpush

