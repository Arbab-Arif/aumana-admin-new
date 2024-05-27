@extends('admin.layouts.master')

@section('page-title',"Edit Blog")

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Blog</h1>
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
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Image</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('update.blog',$blog->id)}}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control"
                                                       placeholder="Please Enter Title"
                                                       value="{{ old('title',$blog->title) }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Author Name</label>
                                                <input type="text" name="author_name" class="form-control"
                                                       placeholder="Please Enter Author Name" value="{{ old('author_name', $blog->author_name) }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Featured Image</label>
                                                <input type="file" name="featured_img" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Short Description</label>
                                                <textarea name="short_description" id="short_description" cols="12"
                                                          class="form-control"
                                                          style="height: 175px;">{{old('short_description',$blog->short_description)}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" id="description" cols="12"
                                                          class="form-control"
                                                          style="height: 279px;">{{old('description',$blog->description)}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
    </script>
@endpush
