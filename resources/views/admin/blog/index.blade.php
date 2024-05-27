@extends('admin.layouts.master')

@section('page-title',"Manage Blog")

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Blog</h1>
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
                                <h3 class="card-title">Manage Blog</h3>
                                <a href="/create-blog" class="btn btn-primary float-right">Create</a>
                            </div>

                            @if(session()->has('success_msg'))
                                <div class="alert alert-success alert-dismissible">
                                    {{ session()->get('success_msg') }}
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                </div>
                            @endif

                            <div class="card-body">
                                <table id="datatable" class="table table-bordered table-striped"></table>
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
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('manage.blog') }}",
                columns: [
                    {data: 'title', title: 'Title', orderable: true, searchable: true, width: '15%'},
                    {data: 'author_name', title: 'Author Name', orderable: true, searchable: true, width: '20%'},
                    {data: 'short_description', title: 'Short Description', orderable: true, searchable: true},
                    {data: 'image', title: 'Original Image', orderable: false, searchable: false},
                    {data: 'featured_img', title: 'Featured Image', orderable: false, searchable: false},
                    {data: 'action', title: 'Action', orderable: false, searchable: false, width: '15%' },
                ]
            });

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
                    axios.get(`/delete-blog/${id}`).then(function (response) {
                        swal({
                            title: response.data.msg,
                            icon: "success",
                            closeOnClickOutside: false
                        }).then((successBtn) => {
                            if (successBtn) {
                                $('#datatable').DataTable().ajax.reload();
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

