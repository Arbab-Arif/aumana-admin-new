@extends('admin.layouts.master')

@section('page-title',"Create Sub-Categories")

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Sub-Categories</h1>
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
                                <h3 class="card-title">Create Sub-Categories</h3>
                            </div>

                            <div class="card-body">
                                <form action="/create-sub-category" method="POST">

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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Selected Category</label>
                                                <h3 class="">Natural Wonderlands</h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control"
                                                       placeholder="Please Enter Sub-Category Name"
                                                       value="{{ old('name') }}">
                                            </div>
                                        </div>

                                        {{--                                        <div class="col-sm-6">--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                               --}}
                                        {{--                                                <select id="subCategory" class="form-control" name="category_id">--}}
                                        {{--                                                    @foreach($categories as $category)--}}
                                        {{--                                                        <option value="{{ $category->id }}" {{(int)old('category_id') === $category->id ? "selected" : ""}}>{{ $category->name }}</option>--}}
                                        {{--                                                    @endforeach--}}
                                        {{--                                                </select>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}


                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">Create</button>
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
    @push('scripts')
    @endpush
@endsection
