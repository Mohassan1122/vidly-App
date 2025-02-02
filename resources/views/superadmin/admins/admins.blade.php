@extends('superadmin.layout.layout')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $title }}</h4>

                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            Admin Id
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Type
                                        </th>
                                        <th>
                                            Mobile
                                        </th>
                                        <th>
                                            Email
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
                                    @foreach ($admins as $admin)
                                    <tr>
                                        <td>
                                            {{ $admin['id'] }}
                                        </td>
                                        <td>
                                            {{ $admin['name'] }}
                                        </td>
                                        <td>
                                            {{ $admin['type'] }}
                                        </td>
                                        <td>
                                            {{ $admin['mobile'] }}
                                        </td>
                                        <td>
                                            {{ $admin['email'] }}
                                        </td>
                                        <td>
                                            <img src="{{ asset('admin/images/photos/'.$admin['image']) }}" alt=""
                                                srcset="">
                                        </td>
                                        <td>
                                            @if ($admin['status']==1)
                                            <a class="updateAdminStatus" id="admin-{{ $admin['id'] }}" admin_id="{{ $admin['id'] }}" href="javascript:void(0)"><i class="mdi mdi-bookmark-check" status="Active" style="font-size: 25px"></i></a>
                                            @else
                                            <a class="updateAdminStatus" id="admin-{{ $admin['id'] }}" admin_id="{{ $admin['id'] }}" href="javascript:void(0)"><i class="mdi mdi-bookmark-outline" status="Inactive" style="font-size: 25px"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($admin['type']=='admin')
                                               <a href="{{ url('superadmin/view-admin-details/'.$admin['id']) }}"> <i class="mdi mdi-file-document" style="font-size: 25px"></i></a> 
                                            @endif
                                           
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
   