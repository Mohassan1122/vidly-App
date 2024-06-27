@extends('superadmin.layout.layout')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="font-weight-bold">Catalogue Management </h3>
                        <h6 class="font-weight-normal mb-0">Sections</h6>
                        <a style="max-width: 150px; float: right; display: inline-block; " href="{{ url('superadmin/add-edit-section') }}" class="btn btn-block btn-primary">Add Section</a>
                        @if (Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                            <strong>Success</strong> {{ Session::get ('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="table-responsive pt-3">
                            <table id="section" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Name
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
                                    @foreach ($sections as $section)
                                    <tr>
                                        <td>
                                            {{ $section['id'] }}
                                        </td>
                                        <td>
                                            {{ $section['name'] }}
                                        </td>
                                        <td>
                                            @if ($section['status']==1)
                                            <a class="updateSectionStatus" id="section-{{ $section['id'] }}" section_id="{{ $section['id'] }}" href="javascript:void(0)"><i class="mdi mdi-bookmark-check" status="Active" style="font-size: 25px"></i></a>
                                            @else
                                            <a class="updateSectionStatus" id="section-{{ $section['id'] }}" section_id="{{ $section['id'] }}" href="javascript:void(0)"><i class="mdi mdi-bookmark-outline" status="Inactive" style="font-size: 25px"></i></a>
                                            @endif
                                        </td>
                                        <td>

                                               <a href="{{ url('superadmin/add-edit-section/'.$section['id']) }}"> <i class="mdi mdi-pencil-box" style="font-size: 25px"></i></a>
                                               
                                               <a title="section" class="comfirmDelete" href="javascript:void(0)" module="section" moduleid="{{ $section['id'] }}"> <i class="mdi mdi-file-excel-box" style="font-size: 25px"></i></a>


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
