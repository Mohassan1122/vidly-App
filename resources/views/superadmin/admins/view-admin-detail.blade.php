@extends('superadmin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Admin Details</h3>
                        <h6 class="font-weight-normal mb-0"><a href="{{ url('superadmin/admins/admin') }}"> Back to
                                Admin Details</a></h6>
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
                        <h4 class="card-title">Personal Information of Admin</h4>

                        <div class="form-group">
                            <label for="exampleInputUsername">Admin Email</label>
                            <input class="form-control" value="{{ $adminDetails['admin_personal']['email'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="company_name">Name</label>
                            <input class="form-control" value="{{ $adminDetails['admin_personal']['name'] }}">
                        </div>
                        <div class="form-group">
                            <label for="company_address">Address</label>
                            <input type="text" class="form-control"
                                value="{{ $adminDetails['admin_personal']['address'] }}">

                        </div>
                        <div class="form-group">
                            <label for="company_city">City</label>
                            <input type="text" class="form-control"
                                value="{{ $adminDetails['admin_personal']['city'] }}">

                        </div>
                        <div class="form-group">
                            <label for="company_state">State</label>
                            <input type="text" class="form-control"
                                value="{{ $adminDetails['admin_personal']['state'] }}">

                        </div>
                        <div class="form-group">
                            <label for="company_country">Country</label>
                            <input type="text" class="form-control"
                                value="{{ $adminDetails['admin_personal']['country'] }}">

                        </div>
                        <div class="form-group">
                            <label for="company_pincode">Pincode</label>
                            <input type="text" class="form-control"
                                value="{{ $adminDetails['admin_personal']['pincode'] }}">

                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile Number</label>
                            <input type="number" class="form-control"
                                value="{{ $adminDetails['admin_personal']['mobile'] }}">
                        </div>

                        @if (!empty($adminDetails['image']))
                        <div class="form-group">
                            <label for="company_image">Image</label><br>
                            <img style="width: 200px" src="{{ url('admin/images/photos/'.$adminDetails['image']) }}">

                        </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Company Information of Admin</h4>
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input class="form-control" value="{{ $adminDetails['admin_business']['company_name'] }}">
                        </div>
                        <div class="form-group">
                            <label for="company_address">Company Address</label>
                            <input type="text" class="form-control"
                                value="{{ $adminDetails['admin_business']['company_address'] }}">

                        </div>
                        <div class="form-group">
                            <label for="company_city">City</label>
                            <input type="text" class="form-control"
                                value="{{ $adminDetails['admin_business']['company_city'] }}">

                        </div>
                        <div class="form-group">
                            <label for="company_state">State</label>
                            <input type="text" class="form-control"
                                value="{{ $adminDetails['admin_business']['company_state'] }}">

                        </div>
                        <div class="form-group">
                            <label for="company_country">Country</label>
                            <input type="text" class="form-control"
                                value="{{ $adminDetails['admin_business']['company_country'] }}">

                        </div>
                        <div class="form-group">
                            <label for="company_pincode">Company Pincode</label>
                            <input type="text" class="form-control"
                                value="{{ $adminDetails['admin_business']['company_pincode'] }}">

                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile Number</label>
                            <input type="number" class="form-control"
                                value="{{ $adminDetails['admin_business']['company_mobile'] }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername">Company Email</label>
                            <input class="form-control" value="{{ $adminDetails['admin_business']['company_email'] }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Company Licence Number</label>
                            <input type="number" class="form-control"
                                value="{{ $adminDetails['admin_business']['license_number'] }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bank Detail of Company</h4>
                        <div class="form-group">
                            <label for="exampleInputUsername">Company Account Name</label>
                            <input class="form-control"
                                value="{{ $adminDetails['admin_bank']['company_account_name'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="company_name"> Company Bank Name</label>
                            <input class="form-control" value="{{ $adminDetails['admin_bank']['company_Bank_name'] }}">
                        </div>
                        <div class="form-group">
                            <label for="company_address">Company Account Number</label>
                            <input type="text" class="form-control"
                                value="{{ $adminDetails['admin_bank']['company_account_number'] }}">

                        </div>
                        <div class="form-group">
                            <label for="company_city">Bank Sort Code</label>
                            <input type="text" class="form-control"
                                value="{{ $adminDetails['admin_bank']['bank_sort_code'] }}">

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
