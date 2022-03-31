@include('layouts.customHead')

<body>
    @extends('layouts.master')

    @section('content')
    <div class="text-light">
        <div class="col-md-12 mt-2">
            <div class="add-user-form ">
                <div class="col-5 card mt-3 p-3 bg-dark">
                    <form class="bg-dark" method="POST" action="/leaves" enctype="multipart/form-data">
                        @csrf
                        <!-- from date -->
                        <div class="form-group">
                            <label for="FromDate" class="text-light">Leave_From_Date</label>
                            <input type="date" name="FromDate" class="form-control" id='code' placeholder="Code" />
                        </div>
                        @if ($errors->has('FromDate'))
                        <label class="text-danger">{{ $errors->first('FromDate') }}</label>
                        @endif

                        <!-- to date -->
                        <div class="form-group">
                            <label for="ToDate" class="text-light">Leave_To_Date</label>
                            <input type="date" name="ToDate" class="form-control" id='code' placeholder="Code" />
                        </div>
                        @if ($errors->has('ToDate'))
                        <label class="text-danger">{{ $errors->first('ToDate') }}</label>
                        @endif

                        <!-- reason -->
                        <div class="form-group">
                            <label for="reason" class="text-light">Reason</label>
                            <input type="text" name="reason" class="form-control" id='reason' placeholder="Reason" />
                        </div>
                        @if ($errors->has('reason'))
                        <label class="text-danger">{{ $errors->first('reason') }}</label>
                        @endif


                        <div class="mt-1 text-center">
                            <div id="thumb-output" class="preview-container">
                                <h4 class="text-danger" id="limitError"></h4>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="/leaves" class="btn btn-secondary">Cansel</a>
                            <input type="submit" class="btn btn-info" value="Submit">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @endsection
</body>

</html>