@extends('superadmin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Catalogue Management </h3>
                        <h6 class="font-weight-normal mb-0">Product Images</h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                    id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Images</h4>
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type=" button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if (Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error</strong> {{ Session::get ('error_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if (Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success</strong> {{ Session::get ('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <form class="forms-sample" action="{{ url('superadmin/add-images/'.$product['id']) }}"
                            class="pt-3" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                &nbsp;&nbsp;{{ $product['product_name'] }}

                            </div>
                            <div class="form-group">
                                <label for="product_code">Product Code</label>
                                &nbsp;&nbsp;{{ $product['product_code'] }}

                            </div>
                            <div class="form-group">
                                <label for="product_color">Product color</label>
                                &nbsp;&nbsp;{{ $product['product_color'] }}

                            </div>
                            <div class="form-group">
                                <label for="product_price">Product Price</label>
                                &nbsp;&nbsp;{{ $product['product_price'] }}

                            </div>

                            <div class="form-group">
                                @if (!empty($product['product_image']))
                                <img style="width: 120px; height: 120px;" alt="Product"
                                    src="{{ url('frontend/images/productImages/medium/'.$product['product_image']) }}">
                                @else
                                <img style="width: 120px; height: 120px;" alt="Product" src="">
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="field_wrapper">
                                    <input type="file" name="images[]" multiple id="images">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn btn-light">Cancel</button>
                        </form>
                        <div class="mt-5">
                            <h4 class="mb-4">Product Images</h4>

                                <table id="product" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                Id
                                            </th>
                                            <th>
                                                Image
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product['images'] as $image)
                                        <tr>
                                            <td>
                                                {{ $image['id'] }}
                                            </td>
                                            <td>
                                                <img style="width: 120px; height: 120px;"  src="{{  asset('frontend/images/productImages/small/' . $image['image']) }}" alt="">
                                            </td>

                                            <td>
                                                @if ($image['status']==1)
                                                <a class="updateImageStatus" id="image-{{ $image['id'] }}"
                                                    image_id="{{ $image['id'] }}" ç><i
                                                        class="mdi mdi-bookmark-check" status="Active"
                                                        style="font-size: 25px"></i></a>
                                                @else
                                                <a class="updateImageStatus" id="image-{{ $image['id'] }}"
                                                    image_id="{{ $image['id'] }}" href="javascript:void(0)"><i
                                                        class="mdi mdi-bookmark-outline" status="Inactive"
                                                        style="font-size: 25px"></i></a>
                                                @endif
                                            </td>
                                            <td>
                                                <a title="image" class="comfirmDelete" href="javascript:void(0)"
                                                    module="image" moduleid="{{ $image['id'] }}"> <i
                                                        class="mdi mdi-file-excel-box" style="font-size: 25px"></i></a>

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

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('superadmin.layout.footer')
    <!-- partial -->
</div>

@endsection
