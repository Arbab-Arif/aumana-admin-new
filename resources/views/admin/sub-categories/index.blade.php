@extends('admin.layouts.master')

@section('page-title',"Manage Sub-Categories")

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Sub-Categories</h1>
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
                                <h3 class="card-title">Manage Sub-Categories</h3>
                                <a href="/create-sub-category" class="btn btn-primary float-right">Create</a>
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
                                        <th>Category Name</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $key => $value)
                                        <tr>
                                            <td>{{ $value->getCategory->name }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>
                                                <a href="/update-sub-category/{{ $value->id }}" class="btn btn-primary">Update</a>
                                                <a href="javascript:void(0);" class="btn btn-danger"
                                                        onclick="deleteDataSet('{{$value->id}}')">Delete</a>
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

        function deleteDataSet(id) {
            swal({
                title: "Are you sure?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false
            }).then((willDelete) => {
                if (willDelete) {
                    axios.get(`/delete-sub-category/${id}`).then(function (response) {
                        swal({
                            title: response.data.msg,
                            icon: "success",
                            closeOnClickOutside: false
                        }).then((successBtn) => {
                            if(successBtn){
                                window.location.reload();
                            }
                        });
                    }).catch(function (error) {
                        swal({
                            title: error.response.data.msg,
                            icon: "error",
                            dangerMode: true,
                            closeOnClickOutside: false
                        });
                    });
                }
            });
        }
    </script>
@endpush

