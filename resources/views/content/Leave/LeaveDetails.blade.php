@include('layouts.customHead')

<body>
    @extends('layouts.master')

    @section('content')
    <div class="text-light">

        <div class="col-md-12 mt-2">
            <div class="bg-transparent d-flex justify-content-between clearfix ">
                <div>
                    <a href="/LeaveManagement" class="btn btn-secondary float-start mb-4">
                        Back
                    </a>
                </div>
                @if(session()->has('updateSuccessOrder'))
                <div class=" alert alert-success alert-dismissible fade show" style="" role="alert">
                    <strong>Success!</strong> {{ session()->get('updateSuccessOrder') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(session()->has('updateErrorOrder'))
                <div class=" alert alert-success alert-dismissible fade show" style="" role="alert">
                    <strong>Success!</strong> {{ session()->get('updateErrorOrder') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>

            <div class="card card-success shadow-sm">
                <div class="card-header card-color">
                    <h3 class="card-title">Leave Details</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body bg-dark text-dark">
                    <div class="row">
                        <div class="col-6 text-center">
                            <div class="details">
                                <h5 class="h-name">Leave ID</h5>
                                <h5 class="value">{{ $leaveData->id }}</h5>
                            </div>
                            <div class="details">
                                <h5 class="h-name">Leave Status</h5>
                                @if($leaveData->status == "Rejected")
                                <h5 class="value text-danger font-weight-bold">Rejected</h5>
                                @elseif (empty($leaveData->status))
                                <h5 class="value text-gray font-weight-bold">Pendng</h5>
                                @elseif ($leaveData->status == 'Accepted')
                                <h5 class="value text-success font-weight-bold">Accepted</h5>
                                @endif
                            </div>
                            <div class="details">
                                <h5 class="h-name">From date</h5>
                                <h5 class="value">{{ $leaveData->leave_from_date }}</h5>
                            </div>
                            <div class="details">
                                <h5 class="h-name">TO date</h5>
                                <h5 class="value">{{ $leaveData->leave_to_date }}</h5>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <div class="details">
                                <h5 class="h-name">Staff Id</h5>
                                <h5 class="value">{{ $leaveData->user_id }}</h5>
                            </div>
                            <div class="details">
                                <h5 class="h-name">Staff Name</h5>
                                <h5 class="value">{{ $leaveData->userData->name}}</h5>
                            </div>
                            <div class="details">
                                <h5 class="h-name">Reason</h5>
                                <h5 class="value">{{ $leaveData->reason }}</h5>
                            </div>
                            <div class="details">
                                <h5 class="h-name">Created at</h5>
                                <h5 class="value">{{ $leaveData->created_at }}</h5>
                            </div>
                        </div>
                        <button type="button" class="ml-3 btn btn-secondary" data-toggle="modal"
                            data-target="#modal-sm">
                            Accept/Reject
                        </button>
                        <div class="modal  fade" id="modal-sm">
                            <div class="modal-dialog modal-sm ">
                                <div class="modal-content bg-dark">
                                    <div class="modal-header bg-gray">
                                        <h4 class="modal-title">Edit</h4>
                                        <button type="button" class="close text-light" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="bg-dark" method="POST"
                                            action="/LeaveManagement/{{ $leaveData->id }}" class="">
                                            @csrf
                                            @method('PUT')
                                            <!-- status -->
                                            <div class="form-group">
                                                <label for="b_description">Leave Status</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input ml-3" type="radio" name="o_status"
                                                        id="inlineRadio1" value='Accepted' {{ $leaveData->status ==
                                                    'Accepted' ?
                                                    'checked' : '' }} >
                                                    <label class="form-check-label" for="inlineRadio1">Accept</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="o_status"
                                                        id="inlineRadio2" value='Rejected' {{ $leaveData->status ==
                                                    'Rejected' ?
                                                    'checked' : '' }}>
                                                    <label class="form-check-label" for="inlineRadio2">Reject</label>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-4">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                    aria-label="Close">
                                                    Cansel
                                                </button>
                                                <input type="submit" class="btn btn-info" value="Edit-Leave">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <div class="col-md-12">
            <div class="card card-warning shadow-sm">
                <div class="card-header ">
                    <h3 class="card-title">User Details</h3>

                    <div class="card-tools ">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body bg-dark">
                    <div class="row">
                        <div class="col-6 text-center">
                            <div class="details">
                                <h5 class="h-name">User Name</h5>
                                <h5 class="value">{{ $leaveData->userData->name }}</h5>
                            </div>
                            <div class="details">
                                <h5 class="h-name">User Email</h5>
                                <h5 class="value">{{ $leaveData->userData->email }}</h5>
                            </div>

                        </div>
                        <div class="col-6 text-center">
                            <div class="details">
                                <h5 class="h-name">Mobile</h5>
                                <h5 class="value">{{ $leaveData->userData->phone }}</h5>
                            </div>
                            {{-- <div class="details">
                                <h5 class="h-name">User Status</h5>
                                @if ($udStatus[0]->status == 0)
                                <h5 class="value text-danger">In active</h5>
                                @else
                                <h5 class="value text-success">Active</h5>
                                @endif
                            </div>
                            <div class="details">
                                <h5 class="h-name">Updated at</h5>
                                <h5 class="value">{{ $udUser[0]->updated_at }}</h5>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>



    @endsection

</body>

</html>