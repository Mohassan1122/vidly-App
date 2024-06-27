@extends('superadmin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Catalogue Management </h3>
                        <h6 class="font-weight-normal mb-0">Categories</h6>
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
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $title }}</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                        <form class="forms-sample" @if (empty($category['id'])) action="{{ url('superadmin/add-edit-category') }}"  @else action="{{ url('superadmin/add-edit-category/'.$category['id']) }}" @endif class="pt-3" method="POST" enctype="multipart/form-data" >
                            @csrf

                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" id="category_name" name="category_name"  @if (!empty($category['category_name'])) value="{{ $category['category_name'] }}" @else value="{{ old(json_encode($category['category_name'])) }}"  @endif>

                            </div>
                            <div class="form-group">
                                <label for="section_id">Select Section</label>
                               <select name="section_id" id="section_id" class="form-control" style="color: #000">
                                <option value="">Select</option>
                                @foreach ($getSections as $getSection)
                                <option value="{{ $getSection['id'] }}" @if (!empty($category['section_id']) && $category['section_id']== $getSection['id'] ) selected @endif >{{ $getSection['name'] }}</option>
                                @endforeach
                               </select>

                            </div>
                            <div id="appendCategoryLevel">
                                @include('superadmin.category.append_category_level')
                                </div>


                            <div class="form-group">
                                <label for="category_image">Category Image</label>
                                <input type="file" class="form-control" id="category_image" name="category_image">
                                @if (!empty($category['category_image']))
                                    <a target="_blank" href="{{ url('frontend/categoryImages/'.$category['category_image']) }}">View Image</a>&nbsp;|&nbsp;
                                    <a title="category" class="comfirmDelete" href="javascript:void(0)" module="category-image" moduleid="{{ $category['id'] }}">Delete Image</a>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="category_discount">Category Discount</label>
                                <input type="text" class="form-control" id="category_discount" name="category_discount"  @if (!empty($category['category_discount'])) value="{{ $category['category_discount'] }}" @else value="{{ old(json_encode($category['category_discount'])) }}"  @endif>

                            </div>

                            <div class="form-group">
                                <label for="description">Category Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="url">Category URL</label>
                                <input type="text" class="form-control" id="url" name="url"  @if (!empty($category['url'])) value="{{ $category['url'] }}" @else value="{{ old(json_encode($category['url'])) }}"  @endif>

                            </div>
                            <div class="form-group">
                                <label for="meta_title">Category Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title"  @if (!empty($category['meta_title'])) value="{{ $category['meta_title'] }}" @else value="{{ old(json_encode($category['meta_title'])) }}"  @endif>

                            </div>
                            <div class="form-group">
                                <label for="meta_description">Category Meta Description</label>
                                <input type="text" class="form-control" id="meta_description" name="meta_description"  @if (!empty($category['meta_description'])) value="{{ $category['meta_description'] }}" @else value="{{ old(json_encode($category['meta_description'])) }}"  @endif>

                            </div>
                            <div class="form-group">
                                <label for="meta_keyword">Category Meta Keyword</label>
                                <input type="text" class="form-control" id="meta_keyword" name="meta_keyword"  @if (!empty($category['meta_keyword'])) value="{{ $category['meta_keyword'] }}" @else value="{{ old(json_encode($category['meta_keyword'])) }}"  @endif>

                            </div>


                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn btn-light">Cancel</button>
                        </form>
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
