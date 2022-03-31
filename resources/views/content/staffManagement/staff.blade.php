@include('layouts.customHead')

<body>
    @extends('layouts.master')

    @section('content')
    <div class="text-light">
        <div class="col-md-12 mt-2">
            <div class="bg-transparent d-flex justify-content-between clearfix ">
                <div>
                    <a href="/dashboard" class="btn btn-secondary float-start mb-4">
                        Back
                    </a>
                </div>
                @if(session()->has('successUser'))
                <div class=" alert alert-success alert-dismissible fade show" style="" role="alert">
                    <strong>Success!</strong> {{ session()->get('successUser') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif (session()->has('errorUser'))
                <div class=" alert alert-danger alert-dismissible fade show" style="" role="alert">
                    <strong>Success!</strong> {{ session()->get('errorUser') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if (session()->has('successDelete'))
                <div class=" alert alert-success alert-dismissible fade show" style="" role="alert">
                    <strong>Success!</strong> {{ session()->get('successDelete') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif (session()->has('errorDelete'))
                <div class=" alert alert-danger alert-dismissible fade show" style="" role="alert">
                    <strong>Success!</strong> {{ session()->get('errorDelete') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>

            <div class="card  ">
                <div class="card-header bg-gray table-heading pl-5 pr-5">
                    <h3 class="card-title">Users Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body bg-dark text-center">

                    <table id="example2" class="table bg-dark table-hover">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count = 0
                            @endphp
                            @foreach ($StaffData as $each)
                            @php
                            $count += 1
                            @endphp
                            <tr class="tr-custom">
                                <td>{{ $count }}</td>
                                <td>{{ $each->name }}</td>
                                <td>{{ $each->UserName }}</td>
                                <td>{{ $each->email }}</td>
                                <td>{{ $each->phone }}</td>
                                <td>
                                    <a href="staff/{{ $each->id }}"><i
                                            class="far fa-folder-open edit text-secondary"></i></a>

                                    <a onclick="return myFunction();" href="/staff/{{ $each->id }}"><i
                                            class="fas fa-trash delete text-danger ml-4"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                    {{ $StaffData->links('pagination::bootstrap-4') }}

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
        $("document").ready(function(){
    setTimeout(function(){
       $(".alert").remove();
    }, 2000 ); // 3 secs

});
    </script>
    @endsection
</body>

</html>