@extends('admin.layouts.master')

@section('page-title',"Create Image")

@section('main-content')
    <style>
        table.table {
            overflow-x: scroll;
            width: 100vw;
            margin: 0 15px;
        }

        .form-group label {
            font-size: 13px;
            font-weight: 600;
        }

        input[type=file]::file-selector-button {
            margin-right: 20px;
            border: none;
            background: #084cdf;
            padding: 10px 20px;
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        input[type=file]::file-selector-button:hover {
            background: #0d45a5;
        }

        .table thead th {
            border-bottom: none;
            background: #343a40;
            color: #fff;
        }

        .table td, .table th {
            border-top: none;
        }

        .table .form-control {
            height: 48px;
        }


        .text-danger {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 800;
            font-size: 30px;
        }

        .text-primary {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 800;
            font-size: 30px;
        }
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Image</h1>
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
                                <h3 class="card-title">Create Image</h3>
                            </div>
                            <div class="card-body">
                                <form action="/create-image" method="POST" enctype="multipart/form-data">
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
                                                <label>Select Category</label>
                                                <select class="form-control" name="category_id" id="category_id"
                                                        onchange="setCategory(this)">
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                                {{(int)old('category_id') === $category->id ? "selected" : ""}} data-sub-categories="{{$category->getSubCategories}}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" id="subCategoryHide">
                                            <div class="form-group">
                                                <label>Select Sub-Category</label>
                                                <select class="form-control" name="sub_category_id" id="sub_category_id"
                                                        disabled>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control"
                                                       placeholder="Please Enter Image Name"
                                                       value="{{ old('name') }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div style="">
                                                <table class="table" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col" style="width:4%" class="text-center">#</th>
                                                        <th scope="col" style="width:13%">Select Image Type</th>
                                                        <th scope="col" style="width:10%">Image Size</th>
                                                        <th scope="col" style="width:10%">Dpi</th>
                                                        <th scope="col" style="width:14%">Personal Use Price</th>
                                                        <th scope="col" style="width:14%">Corporate Use Price</th>
                                                        <th scope="col" style="width:14%">Commercial Use Price</th>
                                                        <th scope="col" style="width:17%">Image</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th class="cancel-line text-center text-primary"
                                                            onclick="addClone(this)">+
                                                        </th>
                                                        <td>
                                                            <select name="select_image_type[]" class="form-control">
                                                                <option value="" selected disabled hidden>Choose type
                                                                </option>
                                                                <option value="thumbnail">Thumbnail</option>
                                                                <option value="standard">Standard</option>
                                                                <option value="small">Small</option>
                                                                <option value="medium">Medium</option>
                                                                <option value="large">Large</option>
                                                                <option value="extra_large">Extra Large</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="text" name="size[]" class="form-control">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="text" name="dpi[]" class="form-control">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="text" name="personal_use_price[]"
                                                                       class="form-control">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="text" name="corporate_use_price[]"
                                                                       class="form-control">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input class="form-control" type="text"
                                                                       name="commercial_use_price[]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input class="" type="file"
                                                                       name="image[]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row col-md-12">
                                            <label>Description</label>
                                            <textarea placeholder="Enter Description" name="description"
                                                      id="description" cols="12"
                                                      class="form-control"
                                                      style="height: 279px;">{{old('description')}}</textarea>
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
@endsection

@push('scripts')
    <script>
        let category = '{{old('category_id')}}';
        let subCategory = '{{old('sub_category_id')}}';

        $(function () {
            if (!category) {

                $("#category_id").val(parseInt($("#category_id option:first").val())).trigger("change");
            } else {
                $("#category_id").val(parseInt(category)).trigger("change");
            }

            if (subCategory) {
                $("#sub_category_id").val(parseInt(subCategory));
            }
        });

        function setCategory(value) {
            if (value.value == 2) {
                $("#subCategoryHide").hide()

            } else {
                $("#subCategoryHide").show()
            }

            setSubCategory();
        }

        function setSubCategory() {
            $('#sub_category_id').empty();
            let dataSet = $("#category_id").find(":selected").data("sub-categories");
            $.each(dataSet, function () {
                $('#sub_category_id').append(`<option value="${this.id}">${this.name}</option>`);
            });
            $('#sub_category_id').attr('disabled', false);
            // console.log($('#sub_category_id').is('disabled'))
            // if () {
            //     console.log($('#sub_category_id').is('disabled'))
            // }
        }

        function addClone(input) {
            $(input).parent().after(`<tr>
                                        <th class="cancel-lin text-center text-danger" onclick="removeClone(this)">x</th>
                                                        <td>
                                                            <select name="select_image_type[]" class="form-control">
                                                                    <option value="" selected disabled hidden>Choose type</option>
                                                                    <option value="thumbnail">Thumbnail</option>
                                                                    <option value="standard">Standard</option>
                                                                    <option value="small">Small</option>
                                                                    <option value="medium">Medium</option>
                                                                    <option value="large">Large</option>
                                                                    <option value="extra_large">Extra Large</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="text" name="size[]" class="form-control">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="text" name="dpi[]" class="form-control">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="text" name="personal_use_price[]"
                                                                       class="form-control">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="text" name="corporate_use_price[]"
                                                                       class="form-control">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input class="form-control" type="text"
                                                                       name="commercial_use_price[]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input class="" type="file"
                                                                       name="image[]">
                                                            </div>
                                                        </td>
                                    </tr>`);

        }

        function removeClone(input) {
            $(input).parent().remove();
        }


    </script>
@endpush
