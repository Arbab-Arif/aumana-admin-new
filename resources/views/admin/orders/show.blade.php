@extends('admin.layouts.master')

@section('page-title','Order Items')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
@endpush

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$order->order_number}}</h1>
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
                                        <th>Image Type</th>
                                        <th>Image Size</th>
                                        <th>Price</th>
                                        <th>Dpi</th>
                                        <th>License</th>
                                        <th>Total Price</th>
                                        <th>Image</th>
                                        {{--                                        <th>Action</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($orderImages)
                                        @foreach($orderImages as $key => $orderImage)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $orderImage->image_type }}</td>
                                                <td>{{ $orderImage->image_size }}</td>
                                                <td>${{ number_format($orderImage->price,2) }}</td>
                                                <td>{{ $orderImage->dpi }}</td>
                                                <td>{{ $orderImage->license }}</td>
                                                <td>${{ number_format($orderImage->total_price,2) }}</td>

                                                <td>
                                                    <div class="col-sm-2">
                                                        <a href="{{url('/'). $orderImage->image}}"
                                                           data-toggle="lightbox"
                                                           data-title="{{$orderImage->image_type}}"
                                                           data-gallery="gallery">
                                                            <img src="{{url('/'). $orderImage->image}}" width="200"
                                                                 class="img-fluid mb-2" alt="white sample"/>
                                                        </a>
                                                    </div>
                                                </td>
                                                {{--                                            <td>{{ $order->getUser->name }}</td>--}}
                                                {{--                                            <td>{{ number_format($order->total_price,2) }}</td>--}}
                                                {{--                                            <td>{{ $order->status }}</td>--}}
                                                {{--                                            <td>--}}
                                                {{--                                                <a href="{{route('admin.user.show',$user->id)}}" class="btn btn-info">Detail</a>--}}
                                                {{--                                            </td>--}}
                                            </tr>
                                        @endforeach
                                    @endif
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/filterizr/2.2.4/filterizr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
    <script>
        $(function () {
            $('#datatable').DataTable();
        });
        $(function () {
            $(document).on('click', '[data-toggle="lightbox"]', function (event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({gutterPixels: 3});
            $('.btn[data-filter]').on('click', function () {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
@endpush

