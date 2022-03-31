@include('layouts.customHead')

<body>
    @extends('layouts.master')

    @section('content')
    <div class="text-light">

        {{-- <p style="width: 100%">{{ $udUser}}</p>
        <p style="width: 100%">{{ $udRole}}</p>
        <p style="width: 100%">{{ $udStatus}}</p>
        <p style="width: 100%">{{ $udAddress}}</p> --}}
        <div class="col-md-12 mt-2">
            <div class="bg-transparent d-flex justify-content-between clearfix ">
                <div>
                    <a href="/staff" class="btn btn-secondary float-start mb-4">
                        Back
                    </a>
                </div>
                @if(session()->has('updateSuccess'))
                <div class=" alert alert-success alert-dismissible fade show" style="" role="alert">
                    <strong>Success!</strong> {{ session()->get('updateSuccess') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if (session()->has('successDeleteOrder'))
                <div class=" alert alert-success alert-dismissible fade show" style="" role="alert">
                    <strong>Success!</strong> {{ session()->get('successDeleteOrder') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif (session()->has('errorDeleteOrder'))
                <div class=" alert alert-danger alert-dismissible fade show" style="" role="alert">
                    <strong>Failed!</strong> {{ session()->get('errorDeleteOrder') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>


            <div class="card card-success shadow-sm">
                <div class="card-header card-color">
                    <h3 class="card-title">Staff Details</h3>

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
                                <h5 class="h-name">Name</h5>
                                <h5 class="value">{{ $StaffData[0]->name }}</h5>
                            </div>
                            <div class="details">
                                <h5 class="h-name"> Email</h5>
                                <h5 class="value">{{ $StaffData[0]->email}}</h5>
                            </div>
                            <div class="details">
                                <h5 class="h-name">Phone</h5>
                                <h5 class="value">{{ $StaffData[0]->phone}}</h5>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <div class="details">
                                <h5 class="h-name">User Name</h5>
                                <h5 class="value">{{ $StaffData[0]->UserName }}</h5>
                            </div>
                            <div class="details">
                                <h5 class="h-name">Department</h5>
                                <h5 class="value">{{ $StaffData[0]->department->name }}</h5>
                            </div>
                            <div class="details">
                                <h5 class="h-name">Updated at</h5>
                                <h5 class="value"> {{ $StaffData[0]->updated_at }}</h5>
                            </div>
                        </div>
                        <div class="text-center" style="width: 100%">
                            <img src="{{ asset('uploads/'. $StaffData[0]->image_path) }}"
                                style="width: 200px; border-radius: 45px;" class="text-center" alt="">
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>

    </div>


    <script>
        function myFunction() {
            if(!confirm("Are You Sure to delete this"))
            event.preventDefault();
        }
    </script>
    @endsection

</body>

</html>