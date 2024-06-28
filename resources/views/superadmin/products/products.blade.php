@extends('superadmin.layout.layout')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Products</h4>
                        <a style="max-width: 150px; float: right; display: inline-block; "
                            href="{{ url('superadmin/add-edit-product') }}" class="btn btn-block btn-primary">Add
                            Products</a>
                        @if (Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                            <strong>Success</strong> {{ Session::get ('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="table-responsive pt-3">
                            <table id="product" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Product Name
                                        </th>
                                        <th>
                                            Product code
                                        </th>
                                        <th>
                                            Product color
                                        </th>
                                        <th>
                                            Product Image
                                        </th>
                                        <th>
                                            Product Cargory
                                        </th>
                                        <th>
                                            Product Section
                                        </th>
                                        <th>
                                            Added By
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
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            {{ $product['id'] }}
                                        </td>
                                        <td>
                                            {{ $product['product_name'] }}
                                        </td>
                                        <td>
                                            {{ $product['product_code'] }}
                                        </td>
                                        <td>
                                            {{ $product['product_color'] }}
                                        </td>
                                        <td>
                                            @if (!empty($product['product_image']))
                                            <img style="width: 120px; height: 120px;"  src="{{  asset('frontend/images/productImages/small/' . $product['product_image']) }}" alt="">
                                            @else
                                            <img src="" alt="No image">
                                        @endif
                                        </td>
                                        <td>
                                            {{ $product['category']['category_name'] }}
                                        </td>
                                        <td>
                                            {{ $product['section']['name'] }}
                                        </td>
                                        <td>
                                            @if ($product['superadmin_type'] == 'admin')
                                            <a target="_blank" href="{{ url('superadmin/view-admin-details/'.$product['superadmin_id']) }}">{{ ucfirst($product['superadmin_type']) }}</a>
                                            @else
                                            {{ ucfirst($product['superadmin_type']) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($product['status']==1)
                                            <a class="updateProductStatus" id="product-{{ $product['id'] }}"
                                                product_id="{{ $product['id'] }}"ç><i
                                                    class="mdi mdi-bookmark-check" status="Active"
                                                    style="font-size: 25px"></i></a>
                                            @else
                                            <a class="updateProductStatus" id="product-{{ $product['id'] }}"
                                                product_id="{{ $product['id'] }}" href="javascript:void(0)"><i
                                                    class="mdi mdi-bookmark-outline" status="Inactive"
                                                    style="font-size: 25px"></i></a>
                                            @endif
                                        </td>
                                        
                                        <td>

                                            <a title="Edit Products"  href="{{ url('superadmin/add-edit-product/'.$product['id']) }}"> <i
                                                    class="mdi mdi-pencil-box" style="font-size: 25px"></i></a>

                                            <a title="Add Product Attribute"  href="{{ url('superadmin/add-edit-attributes/'.$product['id']) }}"> <i
                                                    class="mdi mdi-plus-box" style="font-size: 25px"></i></a>


                                            <a title="Add Images"  href="{{ url('superadmin/add-images/'.$product['id']) }}"> <i
                                                    class="mdi mdi-library-plus"style="font-size: 25px"></i></a>

                                            <a title="product" class="comfirmDelete" href="javascript:void(0)"
                                                module="product" moduleid="{{ $product['id'] }}"> <i
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
    <!-- partial:../../partials/_footer.html -->
    @include('superadmin.layout.footer')

    <!-- partial -->
</div>
<!-- main-panel ends -->

@endsection
