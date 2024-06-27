@extends('superadmin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Update Company Details</h3>
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
        @if ($slug == "personal")
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Personal Information of Company</h4>
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
                        <form class="forms-sample" class="pt-3" method="POST"
                            action="{{ url('superadmin/update-admin-details/personal') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername">Company Email</label>
                                <input class="form-control" id="exampleInputUsername"
                                    value="{{ Auth::guard('superadmin')->user()->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="company_name"> Name</label>
                                <input class="form-control" id="company_name" name="company_name"
                                    value="{{ $AdminDetails['name'] }}">
                            </div>

                            <div class="form-group">
                                <label for="company_country">Country</label>
                                    <select  class="form-control"  name="company_country" id="company_country" style="color: #000">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" @if ($country->name == $AdminDetails['country']) selected @endif >{{ $country->name }}</option>
                                        @endforeach
                                    </select>

                            </div>
                            <div class="form-group">
                                <label for="company_state">State</label>
                                    <select  class="form-control"  name="company_state" id="company_state" style="color: #000">

                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="company_city">City</label>
                                <input type="text" class="form-control" id="company_city" name="company_city"
                                    value="{{ $AdminDetails['city'] }}">

                            </div>

                            <div class="form-group">
                                <label for="company_address">Company Address</label>
                                <input type="text" class="form-control" id="company_address" name="company_address"
                                    value="{{ $AdminDetails['address'] }}">

                            </div>



                            <div class="form-group">
                                <label for="company_pincode">Pincode</label>
                                <input type="text" class="form-control" id="company_pincode" name="company_pincode"
                                    value="{{ $AdminDetails['pincode'] }}">

                            </div>

                            <div class="form-group">
                                <label for="mobile">Mobile Number</label>
                                <input type="number" class="form-control" id="mobile"
                                    value="{{ $AdminDetails['mobile'] }}" min="8" placeholder="Enter 10 digite"
                                    name="company_mobile">
                            </div>

                            <div class="form-group">
                                <label for="company_image">Image</label>
                                <input type="file" class="form-control" id="company_image" name="company_image">
                                @if (!empty(Auth::guard('superadmin')->user()->image))
                                <a target="_blank"
                                    href="{{ url('admin/images/photos/'.Auth::guard('superadmin')->user()->image) }}">View
                                    Image</a>
                                <input type="hidden" name="current_company_image"
                                    value="{{ Auth::guard('superadmin')->user()->image }}">
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @elseif ($slug == "business")

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Business Information of Company</h4>
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
                        <form class="forms-sample" class="pt-3" method="POST"
                            action="{{ url('superadmin/update-admin-details/business') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername">Company Email</label>
                                <input class="form-control" id="exampleInputUsername"
                                    value="{{ Auth::guard('superadmin')->user()->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="company_name"> Name</label>
                                <input class="form-control" id="company_name" name="company_name"
                                    value="{{ $AdminDetails['company_name'] }}">
                            </div>

                            <div class="form-group">
                                <label for="company_country">Country</label>
                                <select  class="form-control"  name="company_country" id="company_country" style="color: #000">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"   @if ($country->name == $AdminDetails['company_country']) selected @endif  >{{ $country->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                             <div class="form-group">
                                <label for="company_state">State</label>
                                    <select  class="form-control" name="company_state" id="company_state" style="color: #000">

                                    </select>

                            </div>

                            <div class="form-group">
                                <label for="company_city">City</label>
                                <input type="text" class="form-control" id="company_city" name="company_city"
                                    value="{{ $AdminDetails['company_city'] }}">

                            </div>
                             <div class="form-group">
                                <label for="company_address">Company Address</label>
                                <input type="text" class="form-control" id="company_address" name="company_address"
                                    value="{{ $AdminDetails['company_address'] }}">

                            </div>

                            <div class="form-group">
                                <label for="company_pincode">Pincode</label>
                                <input type="text" class="form-control" id="company_pincode" name="company_pincode"
                                    value="{{ $AdminDetails['company_pincode'] }}">

                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile Number</label>
                                <input type="number" class="form-control" id="mobile"
                                    value="{{ $AdminDetails['company_mobile'] }}" min="8" placeholder="Enter 10 digite"
                                    name="company_mobile">
                            </div>
                            <div class="form-group">
                                <label for="license_number">licenser Number</label>
                                <input type="number" class="form-control" id="license_number"
                                    value="{{ $AdminDetails['license_number'] }}" min="8" placeholder="Enter 10 digite"
                                    name="license_number">
                            </div>



                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @elseif ($slug == "bank")

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Bank Information of Company</h4>
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
                        <form class="forms-sample" class="pt-3" method="POST"
                            action="{{ url('superadmin/update-admin-details/bank') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername">Company Email</label>
                                <input class="form-control" id="exampleInputUsername"
                                    value="{{ Auth::guard('superadmin')->user()->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="company_account_name">Company Account Name</label>
                                <input class="form-control" id="company_account_name" name="company_account_name"
                                    value="{{ $AdminDetails['company_account_name'] }}">
                            </div>
                            <div class="form-group">
                                <label for="company_Bank_name">Company Bank Name</label>
                                <input type="text" class="form-control" id="company_Bank_name" name="company_Bank_name"
                                    value="{{ $AdminDetails['company_Bank_name'] }}">

                            </div>
                            <div class="form-group">
                                <label for="company_account_number">Company Account Number</label>
                                <input type="text" class="form-control" id="company_account_number"
                                    name="company_account_number" value="{{ $AdminDetails['company_account_number'] }}">

                            </div>
                            <div class="form-group">
                                <label for="bank_sort_code">Bank Sort Code</label>
                                <input type="number" class="form-control" id="bank_sort_code" name="bank_sort_code"
                                    value="{{ $AdminDetails['bank_sort_code'] }}">

                            </div>




                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif


    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('superadmin.layout.footer')
    <!-- partial -->
</div>

@endsection
@section('script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

@endsection

