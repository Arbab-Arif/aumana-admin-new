@extends('admin.layouts.master')

@section('page-title',"Manage Users")

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    {{--    <link rel="stylesheet" href="{{asset('/admin-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{asset('/admin-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{asset('/admin-assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">--}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endpush

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Users</h1>
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

                            <div hidden="hidden" id="message" class="alert alert-success alert-dismissible">

                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
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
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <input data-id="{{$user->id}}" class="toggle-class" type="checkbox"
                                                       data-onstyle="success" data-offstyle="danger"
                                                       data-toggle="toggle" data-on="Active"
                                                       data-off="InActive" {{ $user->status == 1 ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.user.show',$user->id)}}" class="btn btn-info">Detail</a>
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
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="{{ asset('/admin-assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('/admin-assets/js/sweetalert.min.js') }}"></script>
    <script>
        $(function () {
            $('#datatable').DataTable();
        });
        $(function () {
            $('.toggle-class').change(function () {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                axios.post('{{route('admin.user.update')}}', {
                    status: status,
                    id: id,
                })
                    .then((response) => {
                        $("#message").removeAttr('hidden')
                        $('#message').text('user status updated successfully.')
                        location.reload()
                        console.log(response);
                    });


            })
        })
    </script>
@endpush

