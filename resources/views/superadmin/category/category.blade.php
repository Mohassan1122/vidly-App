@extends('superadmin.layout.layout')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category</h4>
                        <a style="max-width: 150px; float: right; display: inline-block; "
                            href="{{ url('superadmin/add-edit-category') }}" class="btn btn-block btn-primary">Add
                            Category</a>
                        @if (Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                            <strong>Success</strong> {{ Session::get ('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="table-responsive pt-3">
                            <table id="category" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Parent Category <small style="color: blue">Sub Category</small>
                                        </th>
                                        <th>
                                            Section
                                        </th>
                                        <th>
                                            URL
                                        </th>
                                        <th>
                                            Category Image
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
                                  
                                    @foreach ($categories as $category)
                                    @if (isset($category['parent_category']['category_name']) &&
                                    !empty($category['parent_category']['category_name']) )
                                    @php
                                    $parent_category = $category['parent_category']['category_name'];
                                    @endphp
                                    @else
                                    @php
                                    $parent_category = "Root Category";
                                    @endphp
                                    @endif
                                    <tr>
                                        <td>
                                            {{ $category['id'] }}
                                        </td>
                                        <td>
                                            {{ $category['category_name'] }}
                                        </td>
                                        <td>
                                            {{ $parent_category }}
                                        </td>
                                        <td>
                                            {{ $category['section']['name']}}
                                        </td>
                                        <td>
                                            {{ $category['url'] }}
                                        </td>
                                        <td>
                                            @if (!empty($category['category_image']))
                                            <img style="width: 120px; height: 120px;"  src="{{  asset('frontend/images/categoryImages/'. $category['category_image']) }}" alt="">
                                            @else
                                            <img src="" alt="No image">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($category['status']==1)
                                            <a class="updateCategoryStatus" id="category-{{ $category['id'] }}"
                                                category_id="{{ $category['id'] }}" href="javascript:void(0)"><i
                                                    class="mdi mdi-bookmark-check" status="Active"
                                                    style="font-size: 25px"></i></a>
                                            @else
                                            <a class="updateCategoryStatus" id="category-{{ $category['id'] }}"
                                                category_id="{{ $category['id'] }}" href="javascript:void(0)"><i
                                                    class="mdi mdi-bookmark-outline" status="Inactive"
                                                    style="font-size: 25px"></i></a>
                                            @endif
                                        </td>
                                        <td>

                                            <a href="{{ url('superadmin/add-edit-category/'.$category['id']) }}"> <i
                                                    class="mdi mdi-pencil-box" style="font-size: 25px"></i></a>

                                            <a title="category" class="comfirmDelete" href="javascript:void(0)" module="category" moduleid="{{ $category['id'] }}"> <i
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